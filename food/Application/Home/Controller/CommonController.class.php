<?php

/*
	*@ 前台通用控制器CommonController，此控制器无实例方法，主要权限分配，登录过滤，登录判断
	*@version edited by liuxiaolin 2015.1.16
*/
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller {

	public function __construct() {
			parent::__construct();
			$user_id = session('user_id');
			if( !empty( $user_id  ) && $user_id >0 )
			{
				define("USER_ID", $user_id);
			}
			else
			{
				$this->redirect('Login/login');
			}
	}



}
