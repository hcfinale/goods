<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>系统登陆入口</title>
    <link type="text/css" rel="stylesheet" href="/Public/assets/css/amazeui.css" />
</head>
<body>
<div class="am-container" style="margin-top: 10%;">
    <div class="am-g">
        <div class="am-u-lg-6 am-u-lg-centered am-padding-sm" style="box-shadow: 0px 0px 5px #000000;">
            <form class="am-form am-form-horizontal" action="/admin.php/Login/check" method="post">
                <h1 class="am-text-center">系统登陆入口</h1>
                <div class="am-form-group">
                    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">用户名</label>
                    <div class="am-u-sm-8">
                        <input type="text" name="username" id="doc-ipt-3" placeholder="输入你的用户名">
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="doc-ipt-pwd-2" class="am-u-sm-3 am-form-label">密码</label>
                    <div class="am-u-sm-8">
                        <input type="password" name="password" id="doc-ipt-pwd-2" placeholder="设置一个密码吧">
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="doc-ipt-pwd-2" class="am-u-sm-3 am-form-label">验证吗</label>
                    <div class="am-u-sm-8">
                        <input class="verifytext" type="text" name="verify">
                        <span><img class="verify_img" id="verify_img" src="<?php echo U('Login/verify');?>" onClick="this.src='<?php echo U('Login/verify');?>'+'?'+Math.random()" style="cursor: pointer;width:150px;border: 1px solid #d5d5d5;" title="点击获取"></span>
                    </div>
                </div>
                <!--
                <div class="am-form-group">
                    <div class="am-u-sm-offset-4 am-u-sm-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> 记住十万年
                            </label>
                            <label class="am-fr">
                                <a href="<?php echo U('Login/add');?>">用户注册</a>
                            </label>
                        </div>
                    </div>
                </div>
                -->
                <div class="am-form-group">
                    <div class="am-u-sm-8 am-u-sm-offset-4">
                        <button type="submit" class="am-btn am-btn-primary">登陆</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--加载jq文件-->
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="/Public/assets/js/amazeui.js"></script>
</body>
</html>