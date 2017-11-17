<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册用户</title>
    <link type="text/css" rel="stylesheet" href="/Public/assets/css/amazeui.css" />
</head>
<body>
<div class="am-container-fluid">
    <div class="am-g">
        <div class="am-u-lg-10 am-u-lg-centered">
            <form class="am-form" action="/admin.php/User/addrule" method="post">
                <h1 class="am-text-center">用户权限分配</h1>
                <table class="am-table">
                    <thead>
                        <tr>
                            <td></td>
                            <td><label class="am-inline-block"><input id="all" type="checkbox"><a>全选</a></label></td>
                            <td><label class="am-inline-block"><button class="am-btn-success">添加节点</button></label></td>
                        </tr>
                        <tr><th width="15">  </th><th>id</th><th>节点</th><th>节点描述</th><th>开启状态</th><th>编辑</th><th>删除</th></tr>
                    </thead>
                    <tbody id="hc-list">
                    <?php if(is_array($rules)): $i = 0; $__LIST__ = $rules;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><input type="checkbox" name="test[]" value="<?php echo ($vo["id"]); ?>"></td>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["name"]); ?></a></td>
                            <td><?php echo ($vo["title"]); ?></td>
                            <td>
                                <lable>
                                    <?php if(($vo["status"] == 1)): ?>开启
                                        <?php else: ?>未开启<?php endif; ?>
                                </lable>
                            </td>
                            <td>
                                <a href="<?php echo U('User/editrule/id/'.$vo['id']);?>">编辑</a>
                            </td>
                            <td>
                                <a href="<?php echo U('User/delrule/id/'.$vo['id']);?>" onclick="return confirm('确认要删除？');">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <div class="am-g">
                    <div class="am-u-sm-3">
                        <label for="doc-ta-group" class="am-btn am-fr">用户分组:</label>
                    </div>
                    <div class="am-u-sm-3">
                        <select class="hc-ajax" id="doc-ta-group" name="group">

                        </select>
                    </div>
                    <div class="am-u-sm-3">
                        <buton class="am-btn am-btn-danger am-fl" disabled>删除分组:</buton>
                        <buton class="am-btn am-btn-secondary am-fr">添加分组:</buton>
                    </div>
                    <div class="am-u-sm-3">
                        <div class="am-form-group">
                            <input type="text" placeholder="输入要添加的分组">
                        </div>
                    </div>
                </div>
                <div class="am-form-group am-margin-xl">
                    <div class="am-u-sm-8 am-u-sm-offset-4">
                        <button type="submit" class="am-btn am-btn-primary hc-submit">确定</button>
                        <!--<button type="reset" class="am-btn am-btn-default">取消</button>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--加载jq文件-->
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="/Public/assets/js/amazeui.js"></script>
<script>
    $(document).ready(function () {
        $('.delete').click(function(){
            var id=$(this).attr('id');
            if(confirm('是否确认删除？')){
                window.location="/admin.php/User/del/id/"+id;
            }
        });
        function group(){
            alert ("你好");
        }
        $.ajax({
            url:'/admin.php/User/returnAj/',
            type:"POST",
            dataType:"json",
            success: function (data) {
                if(data){
                    var user;
                    $.each(data,function(i,result){
                        user = "<option value='"+result.id+"'>"+result.title+"</option>" ;
                        $(".hc-ajax").append(user);
                    });
                }else {
                    alert ("没有获取到数据");
                }
            }
        });
        /*
        $.ajax({
            url:'/admin.php/User/rulereturn/',
            type:"POST",
            dataType:"json",
            success: function (data) {
                if(data){
                    var permissions;
                    $.each(data,function(i,rudata){
                        permissions = "<label class='am-checkbox-inline'><input type='checkbox' name='checkbox' value='"+rudata.id+"'>"+rudata.title+"</label>";
                        $(".hc-qxian").append(permissions);
                    });
                }else {
                    alert ("没有获取到数据");
                }
            }
        });
        */
        // 全选
        $("#all").click(function(){
            if(this.checked){
                $("#hc-list :checkbox").prop("checked", true);
            }else{
                $("#hc-list :checkbox").prop("checked", false);
            }
        });
        $("input").click(function () {
            $(this).attr("checked","checked")
        });
        //修改用户权限
        /*$(".hc-submit").click(function(){
            var valArr = new Array;
            $("#hc-list :checkbox[checked]").each(function(i){
                valArr[i] = $(this).val();
            });
            var vals = valArr.join(',');
            //console.log(vals);
            if(vals!="") {
                if(confirm("确定要是这些吗？")){
                    $.ajax({
                        type:"POST",
                        url:"<?=U('User/addrule/')?>",
                        data:{'id':vals},
                        success:function(data){
                            if(data){
                                alert('修改成功');
                                window.location.reload();
                            }else {
                                alert('修改失败');
                            }
                        }
                    });
                }
            }else {
                alert ("请给用户权限");
            }
        });
        */
    });
</script>
</body>
</html>