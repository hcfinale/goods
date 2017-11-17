<?php
$arr = array(
    'URL_ROUTER_ON' => true,
    /* 支付设置 */
    'payment' => array(
        'alipay' => array(
            // 收款账号邮箱
            'email' => 'sucaihuo@126.com',
            // 加密key，开通支付宝账户后给予
            'key' => 'ggo084pb84gl43qnw82a39n9b7r1jq2m',
            // 合作者ID，支付宝有该配置，开通易宝账户后给予
            'partner' => '2088901006538525',
            //收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
            'seller_id' => '2088901006538525',
            //签名方式
            'sign_type' => strtoupper('MD5'),
            //字符编码格式 目前支持utf-8
            'input_charset' => strtolower('utf-8'),
            // 产品类型，无需修改
            'service' => 'create_direct_pay_by_user',
            // 支付类型 ，无需修改
            'payment_type' => '1',
        ),
        'alipaywap' => array(
            // 收款账号邮箱
            'email' => 'sucaihuo@126.com',
            // 加密key，开通支付宝账户后给予
            'key' => 'ggo084pb84gl43qnw82a39n9b7r1jq2m',
            // 合作者ID，支付宝有该配置，开通易宝账户后给予
            'partner' => '2088901006538525',
            //收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
            'seller_id' => '2088901006538525',
            //签名方式
            'sign_type' => strtoupper('MD5'),
            //字符编码格式 目前支持utf-8
            'input_charset' => strtolower('utf-8'),
            // 产品类型，无需修改
            'service' => 'alipay.wap.create.direct.pay.by.user',
            // 支付类型 ，无需修改
            'payment_type' => '1',
        ),
        'wechatjspai' => array(
            'APPID' => 'wx422126b0b62bbfcfc',
            'MCHID' => '1349825901',
            'KEY' => '2088901006538525',
            'APPSECRET' => '45843e705995a12106155f4c26f716dc',
        ),
    )
);