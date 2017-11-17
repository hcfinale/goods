<?php
namespace home\Controller;
use Think\Controller;
class NotifyController extends Controller {
    public function pay_weixin() {
        $simple = json_decode(json_encode(simplexml_load_string($GLOBALS['HTTP_RAW_POST_DATA'], 'SimpleXMLElement', LIBXML_NOCDATA)), true);

        $notify_data['order_no'] = $notify_data['trade_no'] = $simple['out_trade_no'];
        $notify_data['third_id'] = $simple['transaction_id'];
        $notify_data['pay_money'] = $simple['total_fee'];

        $notify_data['payment_method'] = 'weixin';

//   $sign = $simple['sign'];
//        file_put_contents('ac_simple.txt', json_encode($simple));
//        file_put_contents('ac_notify_data.txt', json_encode($notify_data));

        $this->order_pay($notify_data);
    }

    public function pay_alipay() {
        $notify_data['order_no'] = $notify_data['trade_no'] = I("post.out_trade_no");
        $notify_data['third_id'] = I("post.trade_no");
        $notify_data['pay_money'] = I("post.total_fee");
        $notify_data['payment_method'] = 'alipay';
        $this->order_pay($notify_data);
        file_put_contents('ac_notify_data.txt', json_encode($_REQUEST));
    }

    /**
     * 支付结果返回
     */
    public function order_pay($data_order) {

        $order_no = $data_order['order_no'];
        if ($order_no == '') {
            return false;
        }
        $order_info = M('order')->where(array("order_no" => $order_no))->find();
        if ($order_info['state'] == 0) {
            $data_order['update_time'] = $_SERVER ['REQUEST_TIME'];
            $data_order['state'] = 1; // 已付款
            M('order')->where(array("order_no" => $order_no))->save($data_order);
        }
    }
}