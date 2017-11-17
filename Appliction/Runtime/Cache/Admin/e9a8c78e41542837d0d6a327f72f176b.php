<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
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
        <div class="am-avg-sm-1 hc-center">
            <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><li class="am-block">
                    <img class="am-img-thumbnail am-radius" src="<?php echo ($g["goods_pic"]); ?>" />
                    <p class="am-text-center am-margin-xs"><?php echo ($g["goods_species"]); ?></p>
                    <p class="am-text-center am-margin-xs"><?php echo ($g["goods_name"]); ?></p>
                    <p class="am-text-center am-margin-xs"><?php echo ($g["goods_des"]); ?></p>
                    <p class="am-text-center am-margin-xs"><font color="#ff0000" size="5em">特价</font><?php echo ($g["goods_price"]); ?>元</p>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            <a class="am-fr" href="#" onclick="javascript :history.back(-1);">返回</a>
        </div>
    </div>
</div>
<!--加载jq文件-->
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="/Public/assets/js/amazeui.js"></script>
</body>
</html>