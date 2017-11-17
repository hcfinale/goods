<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理入口</title>
    <link rel="stylesheet" href="/Public/user/css/pintuer.css">
    <link rel="stylesheet" href="/Public/user/css/style.css">
    <script src="/Public/user/js/jquery.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <?php if(is_array($pic)): foreach($pic as $key=>$vo): ?><h1><img src="<?php echo ($vo["pic"]); ?>" class="radius-circle rotate-hover" height="50" alt="" />欢迎<?php echo (session('user')); ?>进入后台</h1><?php endforeach; endif; ?>
    </div>
    <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 网站首页</a> &nbsp;&nbsp;<a href="#" class="button button-little bg-blue"><span class="icon-home"></span> 个人空间</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo U('Login/logout');?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
    <h2><span class="icon-user"></span>基本设置</h2>
    <ul style="display: block;">
        <li><a href="<?php echo U('Index/info');?>" target="right"><span class="icon-caret-right"></span>基本信息</a></li>
        <li><a href="<?php echo U('User/umy');?>" target="right"><span class="icon-caret-right"></span>个人信息</a></li>
        <li><a href="<?php echo U('User/edit');?>" target="right"><span class="icon-caret-right"></span>修改用户信息</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>域名管理</h2>
    <ul>
        <li><a href="<?php echo U('Domain/Index');?>" target="right"><span class="icon-caret-right"></span>域名列表</a></li>
        <li><a href="<?php echo U('Domain/add');?>" target="right"><span class="icon-caret-right"></span>添加域名</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>商品管理</h2>
    <ul>
        <li><a href="<?php echo U('Goods/index');?>" target="right"><span class="icon-caret-right"></span>商品列表</a></li>
        <li><a href="<?php echo U('Goods/add');?>" target="right"><span class="icon-caret-right"></span>添加商品</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>用户管理</h2>
    <ul>
        <li><a href="<?php echo U('User/role');?>" target="right"><span class="icon-caret-right"></span>权限管理</a></li>
        <li><a href="<?php echo U('User/user');?>" target="right"><span class="icon-caret-right"></span>用户管理</a></li>
        <li><a href="<?php echo U('User/add');?>" target="right"><span class="icon-caret-right"></span>添加用户</a></li>
    </ul>
	<h2><span class="icon-pencil-square-o"></span>测试</h2>
    <ul>
        <li><a href="<?php echo U('Category/index');?>" target="right"><span class="icon-caret-right"></span>无限极分类</a></li>
    </ul>
</div>
<script type="text/javascript">
    $(function(){
        var lefth2 = $(".leftnav h2");
        lefth2.first().addClass("on");
        lefth2.click(function(){
            lefth2.next().hide(200);
            lefth2.removeClass("on");
            $(this).next().slideToggle(200);
            $(this).addClass("on");
        });
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
</script>
<ul class="bread">
    <li><a href="javascript:;" target="right" class="icon-home"> 首页</a></li>
    <li><a href="javascript:;" id="a_leader_txt">个人信息</a></li>
</ul>
<div class="admin">
    <iframe scrolling="auto" rameborder="0" src="<?php echo U('Index/info');?>" name="right" width="100%" height="100%"></iframe>
</div>
</body>
</html>