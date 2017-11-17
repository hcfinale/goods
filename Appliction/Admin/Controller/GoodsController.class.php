<?php
namespace Admin\Controller;
use Admin\Common\AclController;
use Think\Page;

class GoodsController extends AclController {
    public function index(){
        $user = M('Goods');
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
        $Page = new Page($count,8);// 实例化分页类 传入总记录数
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list = $user->order('goods_id')->page($nowPage.','.$Page->listRows)->select();
        $show = $Page->show();// 分页显示输出
        $this->assign('upage',$show);// 赋值分页输出
        $this->assign('info',$list);// 赋值数据集
        $this->display(); // 输出模板
    }
    public function uplood(){
        header('Content-Type:text/html;charset=utf8');
        $arr=$_POST;
        foreach($arr as $k=>$v){
            //echo $k;
        }
        //$arr=implode(',',$arr);
        //var_dump($k);
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728;// 设置文件上传大小
        $upload->exts      =     array('jpg','png','jpeg','zip','gif');// 设置附件上传类型
        $upload->rootPath  =      './upload/images/'; // 设置附件上传根目录
        //$upload->savePath  =      ''; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else {// 上传成功 获取上传文件信息
            $Model = M('Goods');
            foreach ($info as $file) {
                //$upload->rootPath . $file['savepath'] . $file['savename'];
            }
            $data['goods_pic'] = $upload->rootPath . $file['savepath'] . $file['savename'];
            //$data['yyclassify'] = $k;
            //$data['dxclassify'] = $file['size'];
            if ($Model->data($data)->add()) {
                $this->success('提交成功', U('index'));
            } else {
                $this->error('提交失败,请检查压缩包格式');
            }
        }
    }
    public function details(){
        $user = M('Goods');
        $resul = $user->where("goods_id={$_REQUEST['id']}")->select();
        $this->assign("rows",$resul);
        $this->display();
    }
    public function add(){
        $this->display(add);
    }
    public function del(){
        $id= $_GET['id'];
        $user = M("Goods");
        if($user->delete($id)){
            $this->success("删除成功",U('user'));
        }else
            $this->error("删除失败",U('user'));
    }
    public function edit(){
        $id=$_GET['id'];
        $user = M("Goods");
        $resoult = $user->find($id);
        $this->assign('row',$resoult);
        //$this->row = $user->find($id);
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
        $user = D("Goods");
        $user->create();
        $user->password = md5($_POST['password']);
        if(!$user->save()){
            $this->error("修改失败",U('user'));
        }else
            $this->success("修改成功",U('user'));
    }
}