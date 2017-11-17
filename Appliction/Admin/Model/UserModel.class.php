<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model{
    //此时模型的名称为User1  并且在数据库中的表名为tp_user,此时要想让这个模型成效就要使用model中的tableName属性吧表名设置下
    //protected $tableName = 'user';

    /*
    trueTableName 包含前缀的数据表名称，也就是数据库中的实际表名，该名称无需设置，只有当上面的规则都不适用的情况或者特殊情况下才需要设置。
    protected $trueTableName = "tp_user";

    定义模型当前对应的数据库名称，只有当你当前的模型类对应的数据库名称和配置文件不同的时候才需要定义。
    protected $dbName = "thinkphp";

    如果需要显式获取当前数据表的字段信息，可以使用模型类的getDbFields方法来获取当前数据对象的全部字段信息，(在controller中用)
    $User   = M('User');
    $fields = $User->getDbFields();
    */

    /*自动验证
    第一个参数为要验证的字段。
    第二个参数为要使用什么的方法验证，可能是自己定义的一个函数，也可以使用里面自带的一些函数进行验证
    第三个参数为验证字段所验证的提示信息
    第四个参数为验证字段 的方式   值有  0， 1 ，2
    第五个参数为自定义函数
    protected $_validate = array(
        array('number', 'require', '手机编号不能为空！'),//默认情况下用正则进行验证
        array('uname', 'require', '昵称不能为空！'),//默认情况下用正则进行验证
        array('sjbh', 'require', '重复！', 0, 'unique', 1),// 在新增的时候验证name字段是否唯一
        array('password', '/^([a-zA-Z0-9]{6,22})$/', '密码格式不正确,请重新输入！', 0),// 正则验证密码 [需包含字母数字以及@*#中的一种,长度为6-22位]
        array('repassword', 'password', '确认密码不正确', 0, 'confirm'), // 验证确认密码是否和密码一致
    );
    */
    protected $_validate = array(
        array('username', 'require', '昵称不能为空！'),//默认情况下用正则进行验证
        array('username', 'require', '重复！', 0, 'unique', 1),// 在新增的时候验证name字段是否唯一
        array('password', '/^([a-zA-Z0-9]{6,22})$/', '密码格式不正确,请重新输入！', 0),// 正则验证密码 [需包含字母数字以及@*#中的一种,长度为6-22位]
        array('repassword', 'password', '确认密码不正确', 0, 'confirm'), // 验证确认密码是否和密码一致
    );
    //字段映射
    protected $_map = array(
        'name' =>'username', // 把表单中name映射到数据表的username字段
        'mail'  =>'email', // 把表单中的mail映射到数据表的email字段
    );
}