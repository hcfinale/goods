<?php
namespace Admin\Controller;  //这个是定义了在哪个模块下的controller
use Admin\Common\AclController;
use Think\Page;
class DomainController extends AclController{
    public function index(){
        $domain = M('Domain');
        $count = $domain->count();// 查询满足要求的总记录数
        $Page = new Page($count,8);// 实例化分页类 传入总记录数
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list = $domain->field('*')->order('id')->page($nowPage.','.$Page->listRows)->select();
        $show = $Page->show();// 分页显示输出
        $this->assign('upage',$show);// 赋值分页输出
        $this->assign('info',$list);// 赋值数据集
        $this->display();
    }
    public function add(){
        if ($_POST){
            $domain = M('Domain');
            $data['name'] = $_REQUEST['name'];
            $data['qtai'] = $_REQUEST['ymqtai'];
            $data['htai'] = $_REQUEST['ymhtai'];
            $data['user'] = $_REQUEST['username'];
            $data['pass'] = $_REQUEST['password'];
            $data['u_name'] = $_SESSION['user'];
            $data['time'] = date("Y-m-d H:i:s");
            $domain->data($data)->add();
            $this->success('添加成功',U('Domain/index'),2);
        }
        $this->display('DomainAdd');
    }
    public function upload(){
        if (!empty($_FILES)) {

            $config = array(
                'maxSize' => 3145728,
                'rootPath' => './',
                'savePath' => './upload/',
                'saveName' => array('uniqid', ''),
                'exts' => array('xls'),
                'autoSub' => true,
                'subName' => array('date', 'Ymd'),
            );
            $upload = new \Think\Upload($config);
            $info = $upload->upload();
            if (!$info) {
                $this->error($upload->getError());
            } else {
                foreach ($info as $file) {
                    $file_name = $file['savepath'] . $file['savename'];
                }
            }

            vendor('PHPExcel.PHPExcel.IOFactory', '', '.php');
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow(); // 取得总行数
            $highestColumn = $sheet->getHighestColumn(); // 取得总列数
            for ($i = 2; $i <= $highestRow; $i++) {
                $data['name'] = $objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue();
                $data['qtai'] = $objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue();
                $data['htai'] = $objPHPExcel->getActiveSheet()->getCell("D" . $i)->getValue();
                $data['user'] = $objPHPExcel->getActiveSheet()->getCell("E" . $i)->getValue();
                $data['pass'] = $objPHPExcel->getActiveSheet()->getCell("F" . $i)->getValue();
                $data['u_name'] = $objPHPExcel->getActiveSheet()->getCell("G" . $i)->getValue();
                $data['time'] = date("Y-m-d H:i:s");
                $rss = M('Domain')->add($data);
            }
            if ($rss)
            {
                $this->success('导入成功！');
            }else{
                $this->error('导入失败，请检查格式！');
            }

        }else
        {
            $this->error("请选择上传的文件");
        }
    }
    public function del(){
        $DomainId = $_REQUEST['id'];
        $domain = M('Domain');
        $domain->where("id={$DomainId}")->delete();
        $this->redirect('Domain/index');
    }
    public function alldel(){
        return;
    }
    public function edit(){
        $DomainId = $_REQUEST['id'];
        $domain = M('Domain');
        if (!$_POST){
            $result = $domain->where("id={$DomainId}")->find();
            $this->assign('domain',$result);
        }else{
            $data['name'] = $_REQUEST['name'];
            $data['qtai'] = $_REQUEST['qtai'];
            $data['htai'] = $_REQUEST['htai'];
            $data['user'] = $_REQUEST['user'];
            $data['pass'] = $_REQUEST['pass'];
            if($domain->where("id={$DomainId}")->save($data)){
                //$this->redirect('Domain/index','修改成功，准备跳转','2');
                $this->success('数据修改成功','index',2);
            }
        }
        $this->display("EditDomain");
        //var_dump($DomainId);
    }
}