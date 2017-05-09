<?php
/**
 * Jquery-File-Upload
 * Created by zhangyu
 * Project:fileupdemo
 * Date: 2017/5/8 0008 下午 2:43
 */

namespace app\admin\controller;


class Jfu extends AdminBase
{
    public function index(){
        return $this->fetch();
    }

    public function doUpload() {
        //获取参数
        $path = config('img_path') ;
        //获取文件
        $files = request()->file() ;

        //设置保存路径
        $result = [] ; $savePath = date('Ymd') ;
        //多文件
        if ($files && is_array($files)) {
            foreach ($files as $file) {

                $fileinfo =$file->getInfo();
                // $filename = str_replace( '.' . pathinfo($fileinfo['name'],PATHINFO_EXTENSION),'',$fileinfo['name'] );
                //文件上传
                $info = $file->move($path) ;
                $result[] = [
                    'filename'		=>	$fileinfo['name'],
                    'name'		=>		$info->getFilename(),
                    'extension'	=>		$info->getExtension(),
                    'path'		=>		$info->getPath(),
                    'realPath'	=>		$info->getRealPath(),
                    'size'		=>		$info->getSize(),
                    'savePath'	=>		$savePath,
                    'saveName'	=>		$savePath . '/' . $info->getFilename() ,
                ] ;
            }
        }
        return getJsonStrSucNoMsg($result) ;
    }
}