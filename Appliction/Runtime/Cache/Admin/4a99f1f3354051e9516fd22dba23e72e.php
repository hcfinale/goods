<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品首页</title>
    <link type="text/css" rel="stylesheet" href="/Public/assets/css/amazeui.css" />
</head>
<body>
<div class="am-container">
    <h2 class="text-center">商品上传</h2>
    <form class="am-form-inline" method="post" action="<?php echo U('Goods/uplood');?>" enctype="multipart/form-data">
        <div class="am-form-group">
            <label class="sr-only" for="inputfile">文件输入</label>
            <input type="file" id="inputfile" name="file">
        </div>
        <div class="checkbox">
            <label>商品种类</label><input type="text" checked="checked" value=""><br />
            <label>商品名称</label><input type="text" checked="checked" value=""><br />
            <label>商品价格</label><input type="text" checked="checked" value=""><br />
            <label>商品简介</label>
            <textarea rows="3" cols="20">

            </textarea>
        </div>
        <div class="am-btn-group">
            <button type="submit" class="am-btn am-btn-success">上传</button>
        </div>
    </form>
</div>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="/Public/assets/js/amazeui.js"></script>
</body>
</html>