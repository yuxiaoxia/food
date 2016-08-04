<?php
namespace Home\Controller;
// 本类由系统自动生成，仅供测试用途
class UserController extends CommonController{
  //登录页面
  public function index(){
    header("Content-Type:text/html; charset=utf-8");
	$User = M('User');
    $id = $_SESSION['user_id'];


      if( $id ){
        $updateUser = $User->where('userid='.$id)->select();
        $this->assign('updateUser',$updateUser);
      }


    $this->display();
  }


  //更改密码，updatepass.html
  public function updatepass(){
      $this->display("updatepass");
  }

  //更改资料，updatezl.html
  public function updatezl(){

    $User = M('User');
    $id = $_SESSION['user_id'];

    if(IS_GET){
      if( $id ){
        $updateUser = $User->where('userid='.$id)->select();
        $this->assign('updateUser',$updateUser);
      }
      $this->display("updatezl");
    }
    if(IS_POST){

      $data = $User->create();
      $User->where('userid='.$id)->save($data);
      $this->success("修改成功");
    }
  }
  public function doupdatepass(){
    $oldPass = I('post.password');
    $repassword = I('post.repassword');
    $updateId = $_SESSION['user_id'];

    $updatePass = M('User');

    $password = $updatePass->where('userid='.$updateId)->getField('password');

    if( $oldPass == $password ){
      $updatePass->where('userid='.$updateId)->setField('password',$repassword);
      $this->success("密码修改成功");
    }
    else{
      $this->error("密码修改失败");
    }
  }


}
