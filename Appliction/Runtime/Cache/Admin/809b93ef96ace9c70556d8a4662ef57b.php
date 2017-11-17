<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>个人信息</title>
    <link rel="stylesheet" href="/Public/user/css/pintuer.css">
    <link rel="stylesheet" href="/Public/user/css/style.css">
    <script src="/Public/user/js/jquery.js"></script>
    <script src="/Public/user/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 个人信息</strong></div>
    <div class="body-content">
        <script>
            //从服务器上获取初始时间
            var currentDate = new Date();
            function run()
            {
                currentDate.setSeconds(currentDate.getSeconds()+1);
                document.querySelectorAll('.time')[0].innerHTML = "&nbsp;&nbsp;"+currentDate.toLocaleString();
            }
            setInterval("run()",1000);
        </script>
        <table width="50%" border="0" style="font-size:16px; line-height:35px;">
            <tr>
                <td width="20%" align="right">当前时间:</td>
                <td class="time"> </td>
                <!--当前的时间 <?php echo date('Y-m-d H:i:s');?>-->
            </tr>
            <tr>
                <td align="right">上次登录IP:</td>
                <td>&nbsp;&nbsp;<?php echo (session('ipbefore')); ?></td>
            </tr>
            <tr>
                <td align="right">用户id:</td>
                <td>&nbsp;&nbsp;<?php echo (session('uid')); ?></td>
            </tr>
            <tr>
                <td align="right">昵称:</td>
                <td>&nbsp;&nbsp;<?php echo (session('user')); ?></td>
            </tr>
            <tr>
                <td align="right">编码格式:</td>
                <td>&nbsp;&nbsp;<?php echo (C("db_charset")); ?></td>
            </tr>
            <tr>
                <td align="right">数据库类型:</td>
                <td>&nbsp;&nbsp;<?php echo (C("DB_TYPE")); ?></font></td>
            </tr>
            <tr>
                <td align="right">数据库用户名:</td>
                <td>&nbsp;&nbsp;<?php echo (C("DB_USER")); ?></font></td>
            </tr>
        </table>
    </div>
    <select class="hc-ajax">

    </select>
</div>
<script>
    //type 中的类型并没有什么限制  tp默认的ajax传输类型是json类型，可以在controller中指定要传输的类型。
    $(document).ready(function () {
       $.ajax({
           url:'/admin.php/Index/info_return/',
           type:"POST",
           dataType:"json",
           success: function (data) {
               if(data){
                   var item;
                   $.each(data,function(i,result){
                       item=" <option value='"+result.goods_species+"'>"+result.goods_name+"</option>" ;
                       $(".hc-ajax").append(item);
                   });
               }else {
                   alert ("没有获取到数据");
               }
           }
       })
    });
</script>
</body>
</html>