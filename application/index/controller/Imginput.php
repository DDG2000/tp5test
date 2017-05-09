<?php
/**
 * Created by zhangyu
 * Project:tp5test
 * Date: 2017/5/9 0009 上午 10:40
 */

namespace app\index\controller;


class Imginput extends IndexBase
{
    public function index(){
        return $this->fetch();
    }

    /**
     * 保存返回路径
     */
    public function save(){
        $file=$_FILES['files'];
        return $this->fileUp($file);
    }

    /**
     * 文件保存
     * @param $file
     * @return bool|string|\think\response\Json
     */
    function fileUp($file){
        if ($file['size'] > 10240000) {
            return getJsonStrError('图片大小不能超过10M');
        }
        //取文件扩展名,判断扩展名
        $type = strtolower(substr($file["name"], strrpos($file["name"], '.')));
        if (!in_array($type, array('.gif', '.jpg', '.jpeg', '.png'))) {
            return getJsonStrError('图片格式不对');
        }
        //判断mime文件类型
        $uptypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif',);
        if (!in_array($file["type"], $uptypes)) {
            return getJsonStrError('文件类型不符');
        }
        $rand = mt_rand(100, 999);
        $name = date("YmdHis") . $rand;
        $name = $name . $type;
        $p='upload/pic/';
        //图片目录
        $date = date("Ymd");
        if (!is_dir($p .  $date)) {
            mkdir($p .  $date);
        }
        //上传图片
        $re=move_uploaded_file($file['tmp_name'], $p.$date.'/'.$name);
        if($re){
            //获取图片大小
            $picsize = getimagesize($p.$date.'/'.$name);
            $arr = array(
                'picname' => $name,
                'picpath' => $date.'/'.$name,
                'picsize' => $picsize,
            );
            return getJsonStrSuc('',['path'=>$date.'/'.$name]);
        }else{
            return getJsonStrError('');
        }
    }
}