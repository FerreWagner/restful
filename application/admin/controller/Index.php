<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
//        3.1
    }

    public function welcome()
    {

    }
}
