<?php
/*
	后台控制登录，菜单控制
*/
namespace Admin\Controller;
use Think\Controller;

class PublicController extends CommonController {
	/**
     * 初始化，那些页面需要
     * @author gongfei
     *
     * @access  public
	 *
     * @return 跳转页面
     */
	public function _initialize() {

		parent::_initialize();


		//登录，退出方法需要得到登录状态
		$loginInfo  = $this->hasAdminLogin();
		$filterLogin = array('logout');
		if (in_array(ACTION_NAME, $filterLogin)) {
			if(!($loginInfo['status']))
			{
				return $this->error($loginInfo['msg'], U('YbirdsAdmin/Public/index'));
			}
		}
		// 登录后不可访问的action
	    $filterAction = array('index','login');
		if (in_array(ACTION_NAME, $filterAction) && $loginInfo['status']) {
		     $this->redirect('YbirdsAdmin/Index/index');
        }
    }

    /**
     * 登录页面
     * @author gongfei
     *
     * @access  public
     *
     * @return 跳转页面
     */
    public function index() {
/*        layout(false);*/
        $this->display();
    }

    /**
     * 处理登录数据
     * @author gongfei
     *
     * @access  public
     * @param   array  POST  用户名，密码，验证码,
     *
     * @return 跳转页面
     */
    public function login() {

        if(IS_POST){
            //得到登录信息
            $info['userName'] = I('post.userName');
            $info['userPasswd']   = I('post.passwd');
            $verify = I('post.verify_code');

            //检测验证码是否正确
            if (!check_verify($verify)) {
                return $this->errorReturn('验证码不正确！', "");
            }
            //判断登录是否成功
            $loginReturn = $this->checkAdminLoginItems($info);
            if ($loginReturn['loginStatus'] == 0){
                return $this->errorReturn($loginReturn['msg'],"");
            }
            //更新管理员登录信息
            $this->updateLoginInfo($loginReturn['userInfo']['userID']);

            // 生成登录session
            session('adminUserID', $loginReturn['userInfo']['userID']);
            session('adminUserName',$loginReturn['userInfo']['userName']);
            $shell .= '_' . time();

            operateLog('后台登录,'.$info['userName'],4);
            return $this->successReturn('登录成功！', U('YbirdsAdmin/Index/index'));
        }
    }

    /**
     * 退出登录
     * @author gongfei
     *
     * @access  public
     *
     * @return 跳转页面
     */
    public function logout() {
        operateLog('后台退出,'.$_SESSION['adminUserName'],4);
       $this->unsetAdminLoginMarked();
       $this->success('退出成功！', U('YbirdsAdmin/Public/index'));
    }

     /**
     * 生成验证码
     * @author gongfei
     *
     * @access  public
     *
     * @return 跳转页面
     */
    public function verify() {
        $config = array(
            'imageW' => 120,
            'imageH' => 40,
            'fontSize' => 16,
            'length' => 4,
            'codeSet' => '0123456789',
            'useNoise' => false,
        );
        $verify = new \Think\Verify($config);
        $verify->entry(1);
    }

    /**
     * 更新登录信息
     * @author gongfei
     *
     * @access  private
     * @param   int   $userID      用户id
     *
     * @return  array   登录数据表信息
     */
    private function updateLoginInfo($userID){
        $updateInfo['lastLoginDate'] = time();
        $updateInfo['lastLoginIP']   = get_client_ip();
        return M('userLoginInfo')->where(array('userID'=>$userID))->save($updateInfo);
    }

    /**
     * 处理登录信息
     * @author  gongfei
     *
     * @access  private
     * @param   array   $userloginInfo      登录信息，userName:用户名。passwd:密码
     *
     * @return  array   $loginArr           loginStatus:0(登录失败)，1(登录成功)。msg:错误消息。userInfo:用户完整信息
     */
    private function checkAdminLoginItems($userLoginInfo){
        $loginReturn = array();
        $loginReturn['loginStatus']    = 0;
        $loginReturn['msg']    = "";
        $loginReturn['userInfo'] = "";
        //没有用户名
        if(empty($userLoginInfo['userName'])){
            $loginReturn['msg'] = "需要用户名";
            return $loginReturn;
        }
        //没有密码
        if(empty($userLoginInfo['userPasswd'])){
            $loginReturn['msg'] = "需要密码";
            return $loginReturn;
        }
        $userLoginInfo['userPasswd'] = md5($userLoginInfo['userPasswd']);
        $userModel = D('Home/User');

        //判断用户是否存在
        $userInfo= $userModel->distinct(true)->where(array('userName'=>$userLoginInfo['userName'],'userType'=>1))->find();
        if($userInfo){
            //密码是否正确
            if($userModel->login($userLoginInfo)){
                $loginReturn['userInfo']       = $userInfo;
                $loginReturn['loginStatus'] = 1;
            }else{
                $loginReturn['msg'] = "密码错误";
                return $loginReturn;
            }
        }else{
            $loginReturn['msg'] = "没有此管理员" ;
            return $loginReturn;
        }
        return  $loginReturn;

    }

}
