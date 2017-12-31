<?php
namespace app\admin\controller;

use app\common\lib\IAuth;
use think\Controller;

class Login extends Base
{
    public function _initialize()
    {
        //Rewrite ini function
    }

    public function index()
    {
        //login validate
        $login = $this->isLogin();
        if ($login){
            return $this->redirect('index/index');
        }else{
            return $this->fetch();
        }
    }

    public function check()
    {
        if (request()->isPost()){
            $data = input('post.');
            if (!captcha_check($data['code'])){
                $this->error('验证码不正确');
            }

            //validate
            $validate = validate('Login');
            if (!$validate->check($data)){
                $this->error($validate->getError());
            }

            //db exception validate
            try {
                $user = model('AdminUser')->get(['username' => $data['username']]);
            }catch(\Exception $e){
                $this->error($e->getMessage());
            }

            if (!$user || $user->status != config('code.status_normal')) {
                $this->error('该用户不存在');
            }
            //validate password
            if (IAuth::setPassword($data['password']) != $user['password']) {
                $this->error('密码不正确');
            }

            //update db && insert session
            $udata = [
                'last_login_time' => time(),
                'last_login_ip'   => request()->ip(),
            ];

            try{
                model('AdminUser')->save($udata, ['id' => $user->id]);
            }catch (\Exception $e){
                $this->error($e->getMessage());
            }

            //session insert
            session(config('admin.session_user'), $user, config('admin.session_user_scope'));
            $this->success('success', 'index/index');

        }else{
            $this->error('请求不合法');
        }
    }

    /**
     * logout
     */
    public function logout()
    {
        session(null, config('admin.session_user_scope'));
        //redirect
        $this->redirect('login/index');
    }

}
