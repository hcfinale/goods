<?php
return array(
    //'配置项'=>'配置值'
    'DB_DEPLOY_TYPE'        => 1, // 设置分布式数据库支持

    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  "Goods",          // 数据库名
    'DB_USER'               =>  'hc',      // 用户名
    'DB_PWD'                =>  'hc123456',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tp_',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'URL_ROUTER_ON'         =>  TRUE,        //开启路由
    'DB_FIELDS_CACHE'       =>  FALSE,        // 关闭字段缓存  项目上线的时候删掉
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志   项目上线的时候删掉
);