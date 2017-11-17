<?php
namespace Admin\Controller;
use Admin\Common\AclController;
use Think\Page;

class UserController extends AclController {
    public function user(){
        $user = M('user');
        /*
        $sql = "select * from tp_user WHERE username='user' order by id ASC";
        $result = $user ->query($sql);
        field方法可以查血这个数据库中的制定的字段group为排序方式
        $result = $user->table('tp_user')->field('id,username,time')->limit(4)->group('id')->select();
        $result = $user->table('tp_user')->where('username like "%a%"')->group('id')->select();
        $result = $user->where('username like "%a%"')->group('id')->select();
        $result = $user->field('id,username')->select();
        $result = $user ->where('id between 2 and 15')->getField("id,username,time",9);//第二个参数是多少条  不写为所有
        */
        $count = $user->count();// 查询满足要求的总记录数
        $Page = new Page($count,2);// 实例化分页类 传入总记录数
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list = $user->field('id,username,sex,age,address')->order('id')->page($nowPage.','.$Page->listRows)->select();
        $show = $Page->show();// 分页显示输出
        $this->assign('upage',$show);// 赋值分页输出
        $this->assign('info',$list);// 赋值数据集
        $this->display(); // 输出模板
    }
    public function umy(){
        $user = M('User');
        $resul = $user->select($_SESSION['uid']);
        $this->assign("rows",$resul);
        $this->display();
    }
    public function add(){
        if($_POST){
            $user = D('User');
            if($user->create()){
                $user->password = md5($_POST['password']);
                $uname = $user->username;
                //$user->time = date('Y-m-d',time());
                $user->add();
                $group = M('AuthGroupAccess');
                $uid = $user->where("username = '$uname'")->getField('id');
                $group->uid = $uid;
                $group->group_id = 3;
                $group->add();
                $this->success("添加成功");
            }else{
                exit($user->getError());
            }
        }else
            $this->display(addyh);
    }
    public function del(){
        $id= $_GET['id'];
        $user = M("user");
        if($user->delete($id)){
            $this->success("删除成功",U('user'));
        }else
            $this->error("删除失败",U('user'));
    }
    public function edit(){
        if($_GET){
            $id = $_REQUEST['id'];
            $user = M("user");
            $resoult = $user->find($id);
            $this->assign('row',$resoult);
        }else{
            $id = $_SESSION['uid'];
            $user = M("user");
            $resoult = $user->find($id);
            $this->assign('row',$resoult);
        }
        $this->display();
    }
    public function updata(){
        /**
         * 更新个别的字段的值。同时还有别的方法setinc setdec详细见开发手册
        $User = M("User"); // 实例化User对象
        更改用户的name和email的值
        $data = array('name'=>'ThinkPHP','email'=>'ThinkPHP@gmail.com');
        $User-> where('id=5')->setField($data);
         */
        $user = D("user");
        $user->create();
        $user->password = md5($_POST['password']);
        if(!$user->where("id={$_REQUEST['id']}")->save()){
            $this->error("修改失败",U('user'));
        }else
            $this->success("修改成功",U('user'));
    }
    public function role(){
        $rule = M('AuthRule');
        $resoult = $rule->field('id,name,title,status')->order('id')->select();
        $this->assign('rules',$resoult);
        $this->display();
    }
    public function addrule(){
        $AuthGroup = M("AuthGroup");
        $data['rules'] = implode(",",$_POST['test']); ;
        $where = $_POST['group'];
        $date=$AuthGroup->where("id='$where'")->save($data);
        if($date){
            $this->success('修改成功');

        }else{
            $this->error('修改失败');
        }

    }
    public function editrule(){
        $id = $_REQUEST['id'];
        $authrule = M("AuthRule");
        $resoult = $authrule->find($id);
        $this->assign('row',$resoult);
        $this->display();
    }
    public function uprule(){
        $data['name'] = I("name", "", "trim");
        $data['title'] = I("title", "", "trim");
        $data['condition'] = I("condition", "", "trim");
        $re = M("AuthRule")->where("id='{$_REQUEST['id']}'")->data($data)->save();
        if($re){
            $this->redirect("User/role");
        }else
            $this->error("修改失败");
    }
    public function returnAj(){
        $Group = M("AuthGroup");
        $result = $Group->select();
        $this->ajaxReturn($result,'json');
    }
    public function rulereturn(){
        $rule = M("AuthRule");
        $rudata = $rule->select();
        $this->ajaxReturn($rudata,'json');
    }
}