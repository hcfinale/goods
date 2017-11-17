<?php
namespace home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $this->display(index);
    }
    public function mailer(){
        think_send_mail('691301630@qq.com','韩昌','信息收到了吗','这是传输内容');
    }
}