<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends \Think\Controller{
  //登录页面
  public function index(){
    header("Content-Type:text/html; charset=utf-8");
    $this->display();
  }
  //登录页面
  public function login(){
    $this->display("login");
  }
  public function logout() {
      session(null); //销毁用户的SESSION信息
      $this->display("Login/login");
  }
  public function dologin(){
    if( IS_POST ){
      $username = I('post.userName');
      $password = I('post.passwd');
      $verify = I('post.verify_code');
      if ( !check_verify($verify)  ) {
          echo json_encode( array("message"=>"验证码错误",'status'=>'error') );
            exit;
      }

      $user = M('User')->where("name=:name")->bind(array(":name"=>$username))->find();

      if( false === $user ){
        echo json_encode( array( 'message'=>'用户不存在', 'status'=>'error' ) );
        exit;
      }
      else if( $user["password"] != $password ){
        echo json_encode( array( 'message'=>'密码错误', 'status'=>'error' ) );
        exit;
      }
      session("user_id", $user['userid']);
      session("name", $user['name']);
			$info['logintime'] = date( "Y-m-d H:i:s",time() );//登录时间
			M("User")->where('userid='.$user['userid'])->save($info);//更新数据
      M("User")->where('userid='.$user['userid'])->setInc('loginnum'); // 用户的登录次数加1
      echo json_encode( array( 'message'=>'登录成功', 'status'=>'success' ) );

    }
  }
  //注册页面
  public function register(){

    $this->display("register");
  }
  //注册
  public function doregister(){
      $user = M("User");
      $data = $user->create();
      $name = $data["name"];
      $phone = $data['phone'];
      $res = $user->where("name = '$name'")->find();
      $p =  $user->where("phone = '$phone'")->find();
		  if( $res ){
        // echo json_encode( array( 'message'=>'用户名已存在', 'status'=>'error' ) );
        $this->error('用户名已存在');
        exit;
		  }
      if( $p ){
        // echo json_encode( array( 'message'=>'用户名已存在', 'status'=>'error' ) );
        $this->error('该号码已存在');
        exit;
      }

      if ( $user->add($data)) {
          $this->success('注册成功');
          $this->redirect('Home/User/login');
      } else {
          $this->error('注册失败');
      }
  }
  
    //验证码显示
  	public function verify(){
  		$config = array(
  			'fontSize' => 10,
  			'length' => 4,
  			'codeSet' => '0123456789',
  			'useNoise' => false,
  		);
  		$verify = new \Think\Verify($config);
  		$verify->entry(1);
  	}

}
