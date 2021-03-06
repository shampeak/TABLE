<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2016/6/29
 * Time: 11:14
 */

header("Content-type: text/html; charset=utf-8");//解决中文显示乱码问题
include("../vendor/autoload.php");

echo "<pre>";
$config = [
    'user'          => 'userId',            //操作的表与主键
    'hostname'      => '127.0.0.1',         //服务器地址
    'port'          => '3306',              //端口
    'username'      => 'root',              //用户名
    'password'      => 'root',              //密码
    'database'      => 'lut',                //数据库名
    'charset'       => 'utf8',              //字符集设置
    'pconnect'      => 1,                   //1  长连接模式 0  短连接
    'quiet'         => 0,                   //安静模式 生产环境的
    'slowquery'     => 1,                   //对慢查询记录
    'increment'     => 1,                   //对where增量进行记录
    'reflection'    => 1,                   //反射部分信息以供调试
    'queryrecord'   => 1                  //对所有查询进行记录
];


$user = new Lulu\Table\Table($config);
$res=$user->table('user')->where("userId<50")->field("userId,login,password,email")->limit("10,20")->order("password,userId desc")->key('userId')->all();
print_r($res);

$user->table('user')->delete(60);
$user->reset();
$user->where("userId=59")->delete();
$user->reset();
$value=
[
    'login'     => 'select',
    'nickName'  => 'x7x658',
    'password'  => '12345678',
    'email'     => 'shampeak@sina.com',
    'mobile'    => '13811069199',
];
$user->insert($value);
$user->reset();
$value=
    [
        'login'     => '111',
        'nickName'  => 'x7x658',
        'password'  => '12345678',
        'email'     => 'shampeak@sina.com',
        'mobile'    => '13811069199',
    ];
$user->update($value,1);
$value=
    [
        'login'     => '222',
        'nickName'  => 'x7x658',
        'password'  => '12345678',
        'email'     => 'shampeak@sina.com',
        'mobile'    => '13811069199',
    ];

$user->where("userId=1")->update($value);
$user->reset();


$res=$user->where("userId<50")->field("login,password,email")->limit("10,20")->order("password")->all();
$user->reset();
print_r($res);

$res=$user->where("userId<50")->limit("10,20")->order("password")->all();
$user->reset();
print_r($res);