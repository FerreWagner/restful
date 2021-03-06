<?php
namespace app\admin\controller;

use app\common\lib\Upload;
/**
 * QINIU 后台图片上传逻辑
 * Class Image
 * @package app\admin\controller
 */
class Image extends Base
{
    public function upload0()
    {

        return 1;
    }

    /**
     * 七牛图片上传
     */
    public function upload() {
        try {
            $image = Upload::image();
        }catch (\Exception $e) {
            echo json_encode(['status' => 0, 'message' => $e->getMessage()]);
        }
        if($image) {
            $data = [
                'status' => 1,
                'message' => 'OK',
                'data' => config('qiniu.image_url').'/'.$image,
            ];
            echo json_encode($data);exit;
        }else {
            echo json_encode(['status' => 0, 'message' => '上传失败']);
        }
    }

}
