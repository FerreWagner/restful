<?php
/**
 * Created by PhpStorm.
 * User: 15736
 * Date: 2017/12/30
 * Time: 22:18
 */

namespace app\common\validate;

use think\Validate;

class Login extends Validate
{

    protected $rule = [
        'username' => 'require|max:20',
        'password' => 'require|max:20',

    ];
}