<?php
//$module=isset($_GET['m'])?$_GET['m']:'index';
//$action=isset($_GET['a'])?$_GET['a']:'index';
//$mooc=new $module();
//$mooc->$action();
//class test{
//	function __construct(){
//		echo "调用了控制器";
//	}
//	function test(){
//		echo "调用le test 方法";
//	}
//}

//这是项目的入口文件
define('APP_NAME','App');//项目名称
define('APP_PATH','./App/');//项目路径
define('APP_DEBUG',TRUE);//开启调试模式
//加载框架入口
require './ThinkPHP/ThinkPHP.php';

?>