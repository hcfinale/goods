<?php
namespace home\Controller;
use Think\Controller;
class PayController extends Controller {
    public function submit() {
        $paytype = I("post.paytype");
        $data['order_money'] = I("post.money", 1);//订单金额
        $data['order_no'] = date("YmdHis") . rand(1000, 9999);//订单号
        $data['pay_type'] = $paytype;
        $data['addtime'] = time();
        M("order")->add($data);
        $site_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        $dir = dirname($site_url);
        $data['url_notify'] = $dir . "/Notify/pay_alipay";//回调地址
        $data['url_return'] = $dir . "/Pay/order_detail";//返回地址
        $data['title'] = "标题" . $data['order_no'];
        $data['body'] = "主体内容" . $data['order_no'];
        if ($paytype == 'alipay') {
            $this->alipay_jump($data);
        } elseif ($paytype == 'wechat_code') {
            $data['url_notify'] = $dir . "/Notify/pay_weixin";
            $this->wechat_jump($data);
        }
    }
}