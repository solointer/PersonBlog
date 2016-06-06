<?php
define('URL_CALLBACK', 'http://demo.cn/index.php?m=Index&a=callback&type=');
return array(
	//腾讯QQ登录配置
	'THINK_SDK_QQ' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'qq',
	),
	//'配置项'=>'配置值'
	'APP_GROUP_LIST'=>'Index,Admin',
	'DEFAULT_GROUP'=>'Index',
	'Username'=>'廉恒凯',
	//数据库连接参数
	'DB_HOST'=>'test01.com',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_NAME'=>'blog',
	'DB_PREFIX'=>'',
	//点语法默认解析
	//'TMPL_VAR_IDENTIFY'=>'array'.
	//配置过滤函数
	//'DEFAULT_FILTER'=>'htmlspecialchars',
	//自定义session的数据库存储
	'SESSION_TYPE'=>'Db',
	//开启数据库的调试模式
	'SHOW_PAGE_TRACE'=>true,
);
?>