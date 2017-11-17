<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function login(){
        /*
        使用M方法和D方法的区别在于M方法不需要加载更多的一些模型上的操作。当我们对数据表进行 CURD 操作的时候M方法完全够用。
        而我们需要对数据表进行验证的时候我们就要用到D方法了。不用D方法的原因就是D方法会影响效率。
        $user = M("user");
        $result = $user->select();
        $this->assign("info",$result);//注册变量
        */
        $this->display();
    }
    public function check(){
        $username=$_POST['username'];
        $password=md5(trim($_POST['password']));
        //验证码的制作
		/*
        $verify = I('param.verify','');
        if(!check_verify($verify)){
            $this->error("亲，验证码输错了哦！",$this->site_url,2);
        }
		*/
		$user = M("User");
        $result = $user->where("username='{$username}' and password='{$password}'")->find();
        if($result){
            $_SESSION['uid']=$user->id;
            $_SESSION['user']=$username;
            $_SESSION['ipbefore']=$user->ipbefore;
            $this->success('登录成功',U('Index/index'),3);
        }else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('密码错误或用户名没有，登录失败');
        }
    }
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->entry();
    }
    public function add(){
        $this->display(addyh);
    }
    public function logout(){
        $hostip = $_SERVER['REMOTE_ADDR'];
        $user = M("User");
        $user->ipbefore = "$hostip";
        $ipnow = $_SESSION['uid'];
        $user->where("id='$ipnow'")->save();
        $_SESSION = array();
        $this->redirect('Login/login');
    }
}