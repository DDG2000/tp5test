<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 获取json字符串
 * 以tp5中json为基础
 * @param number $code
 * @param string $msg
 * @param unknown $data
 * @param $url 跳转地址
 * Author sakura 2016年7月6日上午11:15:00
 */
function getJsonStr($code=511,$msg='error',$data=array(),$url=''){
    /* {
        code:xxx,
        msg:xxx,
        data:{}
    } */
    return json(array('code'=>$code,'msg'=>$msg,'data'=>$data,'url'=>$url));
}
/**
 * 成功JSON
 * @param $msg
 * @param array $data
 * @param $url 跳转地址
 * Author sakura 2016年7月6日下午5:19:16
 */
function getJsonStrSuc($msg='',$data=array(),$url=''){
    return getJsonStr(200,$msg,$data,$url);
}
/**
 * 成功JSON，木有消息
 * @param mixed $data
 */
function getJsonStrSucNoMsg ($data=[],$url='') {
    return getJsonStrSuc('',$data,$url) ;
}

/**
 * "page":1,"count":"1","pcount":1,"data":
 * @param unknown $page
 * Author sakura 2016年7月29日上午10:43:08
 */
function getJsonPage($page=null,$data=[],$currentPage=10){
    $re = [];
    if($page){
        $re['data'] = $page->items()->all();//内容
        $re['page'] = $page->currentPage();//当前页数
        $re['pcount'] = $page->lastPage();//最后一页
        $re['count'] = $page->total();//总条数//$page->listRows();
    }else{
        $re['data'] = [];//内容
        $re['page'] = $currentPage;//当前页数
        $re['pcount'] = $currentPage;//最后一页
        $re['count'] = 0;//总条数//$page->listRows();
    }
    if($data){
        foreach ($data as $k=>$v){
            $re[$k] = $v;
        }
    }
    return getJsonStrSucNoMsg($re);
}
/**
 * 操作失败JSON
 * @param string $msg
 * @param number $code
 * Author sakura 2016年7月8日下午3:48:26
 */
function getJsonStrError($msg='error',$code=511,$url=''){
    return getJsonStr($code,$msg,$url);
}