<?php
namespace Admin\Controller;  //这个是定义了在哪个模块下的controller
use Admin\Common\AclController;
class IndexController extends AclController {
    public function index(){
        /*
         *
         * 使用M方法实例化,操作db_name中的ot_user表
           $User = M('db_name.User','ot_');
           执行其他的数据库操作
           $User->select();
         * */

        $goods = M("goods");
        $where = "tp_user.id='{$_SESSION["uid"]}'";
        $result1 = $goods->join('tp_user on tp_goods.u_id = tp_user.id')->where("$where")->select();
        $this->assign("info",$result1);//注册变量
        $result2 = $goods->table("tp_user")->field("username,sex,age,phone,address,pic")->where("id={$_SESSION['uid']}")->select();
        $this->assign("pic",$result2);//注册变量
        $this->display();
    }
    public function  info(){
        $user = M("User");
        $hostip = $_SERVER['REMOTE_ADDR'];
        $user->ipnow = "$hostip";
        $ipnow = $_SESSION['uid'];
        $user->where("id='$ipnow'")->save();
        $this->display();
    }
    public function info_return(){
        $goods = M("goods");
        $result = $goods->select();
        $this->ajaxReturn($result,'json');
    }
    public function details(){
        $p_id = $_REQUEST['id'];
        $goods = M("goods");
        $where = "tp_goods.goods_id='$p_id'";
        $result = $goods->where("$where")->select();
        $this->assign("info",$result);//注册变量
        $this->display();
        /*
        $data['day']  = '2017-6-6';
        $data['name'] = 'gaokao';
        $this->ajaxReturn($data);
        */
    }
}