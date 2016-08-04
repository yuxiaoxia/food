<?php
return array(
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysqli',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    // 'DB_HOST'               =>  '', // 服务器地址
    'DB_NAME'               =>  'food',    // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',     // 密码
    // 'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'food_',      // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    =>   false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       =>  false,       // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    'USER_AUTH_KEY'         =>  'userId',
  //
  //   //过滤I 函数html标签
  //   'DEFAULT_FILTER'        =>  'strip_tags', // 默认参数过滤方法 用于I函数...
  //
	// 模块相关配置
	'MODULE_ALLOW_LIST'    => array('Home','Admin'),
	'DEFAULT_MODULE' => 'Home',

	// 设置默认的模板主题
	'DEFAULT_THEME'    =>    'default',
  'TPL_PATH' => './Template/',

	//URL配置
//	'URL_CASE_INSENSITIVE' => true, // 默认false 表示URL区分大小写 true则表示不区分大小写
	//'URL_MODEL' => 1,				// 2. Rewrite模式
	//'URL_PATHINFO_DEPR' => '-',		// PATHINFO URL分割符


	//语言包
	'LANG_SWITCH_ON'      =>     true,    //开启语言包功能
  'LANG_AUTO_DETECT'    =>     true,    // 自动侦测语言
  'DEFAULT_LANG'        =>     'zh_cn', // 默认语言
	'LANG_LIST'           =>     'zh_cn,zh_tw', //必须写可允许的语言列表
  'VAR_LANGUAGE'        =>     'l', // 默认语言切换变量

	//后台权限设置
	//'AUTH_TOKEN' => 'ybirds' // 认证token
	//'USER_AUTH_ON' = TRUE,
//	'ADMIN_AUTH_TOKEN'   =>  'ybirdsAdmin',

	//后台cookie设置
	// 'ADMIN_LOGIN_TIMEOUT' => 36000, //cookie 失效时间
	// 'ADMIN_LOGIN_MARKED'    => md5('ybirdsAdmin'),


  //图片上传相关配置
  'PIC_UPLOAD' => array(
	'mimes'    => '', //允许上传的文件MiMe类型
	'maxSize'  => 2*1024*1024, //上传的文件大小限制 (0-不做限制)
	'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
	'autoSub'  => true, //自动子目录保存文件
	'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
	'rootPath' => './Uploads/', //保存根路径
	'savePath' => '', //保存路径
	'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
	'saveExt'  => '', //文件保存后缀，空则使用原后缀
	'replace'  => true, //存在同名是否覆盖
	'hash'     => true, //是否生成hash编码
	'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
  ),

 //
 // // error，success跳转页面
 //  'TMPL_ACTION_ERROR' => 'Common:dispatch_jump',
 //  'TMPL_ACTION_SUCCESS' => 'Common:dispatch_jump',
 //
 //   'TMPL_EXCEPTION_FILE'=>'./error.html', // 定义公共错误模板

  'LOG_RECORD' => true, // 开启日志记录
  'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR,NOTICE', // 只记录EMERG ALERT CRIT ERR 错误
//    'LOG_TYPE'    =>  'File', // 日志记录类型 默认为文件方式

  'HTML_CACHE_ON'=>true,  //关闭所有html 缓存

);
