<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"F:\mytest\tp5test\public/../application/index\view\imginput\index.html";i:1494322156;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery带预览可拖拽文件上传代码</title>

    <link rel="stylesheet" type="text/css" href="/static/js/ImgInput/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/js/ImgInput/css/style.css">
    <link rel="stylesheet" href="/static/js/ImgInput/css/ssi-uploader.css"/>
    <style>
        .img-box{
            overflow: hidden;
            position: relative;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>不带拖放区域：</h3>
                <input type="file" multiple id="ssi-upload"/>
            </div>
        </div>
    </div>
</div>

<script src="/static/js/ImgInput/js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="/static/js/ImgInput/js/ssi-uploader.js"></script>
<script type="text/javascript">
    $('#ssi-upload').ssi_uploader({
        url:'/Imginput/save',
        dropZone:false,
        allowed:['jpg','gif','txt','png','pdf'],
        beforeUpload:function () {
            console.log(1);
        },
        onUpload:function (re) {
            console.log(1);
        }
    });

</script>

</body>
</html>