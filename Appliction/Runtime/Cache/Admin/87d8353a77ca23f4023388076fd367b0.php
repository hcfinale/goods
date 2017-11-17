<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台首页</title>
    <link type="text/css" rel="stylesheet" href="/Public/assets/css/amazeui.css" />
    <style>
        .hc-nav{display: block;width: 80%;margin: 0 auto;}
        .hc-center{display: block;width: 33.3333%;margin: 0 auto;}
    </style>
</head>
<body>
<div class="am-container-fluid">
    <div class="am-block am-padding-top-xl hc-nav">
        <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="am-avg-sm-1 hc-center">
                <h2 class="am-text-center">个人信息</h2>
                <br><label>用户id：</label><?php echo ($v["id"]); ?>
                <br><label>用户名：</label><?php echo ($v["username"]); ?>
                <br><label>性别：</label><?php echo ($v["sex"]); ?>
                <br><label>年龄：</label><?php echo ($v["age"]); ?>
                <br><label>地址：</label><?php echo ($v["address"]); ?>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!--加载jq文件-->
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="/Public/assets/js/amazeui.js"></script>
</body>
</html>