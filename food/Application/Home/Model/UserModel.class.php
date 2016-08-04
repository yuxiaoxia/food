<?php
namespace Admin\Model;
use Think\Model;
//自定义资源管理类

class UserModel extends Model{
    // 设置数据表的字段
    // protected $fields = array(
    //     "id","username","userpass","name","sex","age","email","class","picture","level","point","addtime","introduce","_pk"=>"id","_autoinc"=>true
    // );

    //设置数据的自动处理功能
    // protected $_auto = array(
    //     // array("addtime","time",1,"function"),//设置添加时间用函数time()
    //     array("password","mypass",1,"callback"),
    // );
    // protected function mypass(){
    //     return md5($_POST['password']);
    // }

    // protected $_validate = array(
    //     array("name","","用户名已存在！",0,"unique",1),
    //     array("phone","","号码已存在",0,"unique",1),
    // );
}
