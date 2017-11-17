<?php
namespace Admin\Common;
use Think\Controller;
class AclController extends Controller{
    public function _empty(){
        echo "操作名称有误";
        //$this->redirect('error');
    }
    function _initialize(){
        if (!$_SESSION['uid']) {
            $this->error('没有权限访问！', U('Login/login'));
        } elseif ($_SESSION['uid'] == '1') {
            return true;
        }
        //权限验证
        $auth = new \Think\Auth();
        if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session('uid'))){
            $this->error('没有权限');
        }
    }
}