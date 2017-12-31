<?php
namespace app\admin\controller;

use think\Controller;

class Login extends Controller
{
    public function index()
    {
//        phpinfo();
        return $this->fetch();
    }

}
