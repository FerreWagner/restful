<?php
/**
 * Created by PhpStorm.
 * User: 15736
 * Date: 2017/12/31
 * Time: 19:29
 */

/**
 * Class IAuth
 * IAuth相关
 */
namespace app\common\lib;

class IAuth
{
    /**
     * @param $data
     * @return string
     */
    public static function setPassword($data)
    {
        return md5($data.config('app.password_pre_halt'));
    }
}