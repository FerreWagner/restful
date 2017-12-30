<?php
/**
 * Created by PhpStorm.
 * User: 15736
 * Date: 2017/12/30
 * Time: 22:18
 */

namespace app\common\model;

use think\Model;

class AdminUser extends Model
{
    //时间戳新增
    protected $autoWriteTimestamp = true;

    public function add($data)
    {
        if (!is_array($data)) exception('传递数据不合法');

        $this->allowField(true)->save($data);

        return $this->id;
    }

}