<?php

/*
	*@ 前台通用控制器CommonController，此控制器无实例方法，主要权限分配，登录过滤，登录判断
	*@version edited by liuxiaolin 2015.1.16
*/
namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller {

  public function _initialize() {

      $user_id = session('user_id');
      if( !empty( $user_id  ) && $user_id >0 )
      {
        $user = M('User')->find( $user_id );

        if( intval( $user['root'] == 0 ) )
        {
          $this->error('你没有权限进入后台管理系统');
        }
        define("USER_ID", $user_id);
      }
      else
      {
        $this->redirect('Home/User/login');
      }
  }

}
