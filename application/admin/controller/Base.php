<?php
namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    //base controller

    public function _initialize()
    {
        //login validate
        $login = $this->isLogin();
        if (!$login){
            return $this->redirect('login/index');
        }
    }

    public function isLogin()
    {
        //get session
        $user = session(config('admin.session_user'), '', config('admin.session_user_scope'));
        if ($user && $user->id){
            return true;
        }
        return false;
    }

}
