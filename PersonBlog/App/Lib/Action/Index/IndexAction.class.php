<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		//echo  C('Username');
		//echo "这是前台";
		//后台的专用配置文件
		//echo  C('Admin');
		//echo  md5('329919');
		//die;
		$wish=M('wish')->order('time DESC')->limit($limit)->select();
		
		$this->wish=$wish;
		$this->display();
	}
	public function handle(){
		//if(!IS_AJAX)
		//	halt('页面不存在');
		//$username=I('username');
		$data=array(
			'$username'=>I('username'),
			'$content'=>I('content'),
			'$time'=>time()
		);
		//处理一些表情
		//$phiz=array(
		//'zhuakuang'=>'抓狂',
		//'baobao'=>'抱抱'，		
		//);
		//写入文件
		//F('phiz',$phiz,'./Data/');
		//读取文件
		//F('phiz','','./Data/');
	
		
	}
	//登录地址
	public function login($type = null){
		empty($type) && $this->error('参数错误');

		//加载ThinkOauth类并实例化一个对象
		import("ORG.ThinkSDK.ThinkOauth");
		$sns  = ThinkOauth::getInstance($type);

		//跳转到授权页面
		redirect($sns->getRequestCodeURL());
	}

	//授权回调地址
	public function callback($type = null, $code = null){
		(empty($type) || empty($code)) && $this->error('参数错误');
		
		//加载ThinkOauth类并实例化一个对象
		import("ORG.ThinkSDK.ThinkOauth");
		$sns  = ThinkOauth::getInstance($type);

		//腾讯微博需传递的额外参数
		$extend = null;
		if($type == 'tencent'){
			$extend = array('openid' => $this->_get('openid'), 'openkey' => $this->_get('openkey'));
		}

		//请妥善保管这里获取到的Token信息，方便以后API调用
		//调用方法，实例化SDK对象的时候直接作为构造函数的第二个参数传入
		//如： $qq = ThinkOauth::getInstance('qq', $token);
		//import("ORG.ThinkSDK.ThinkOauth"); //导入SDK基类

		$token = $sns->getAccessToken($code , $extend);
		$qq   = ThinkOauth::getInstance('qq', $token); //实例化腾讯QQ开放平台对象 $token 参数为授权成功后获取到的 $token
		$data = $qq->call('user/get_user_info'); //调用接口 
		//获取当前登录用户信息
		if(is_array($token)){
			$user_info = A('Type', 'Event')->$type($token);

			echo("<h1>恭喜！使用 {$type} 用户登录成功</h1><br>");
			echo("授权信息为：<br>");
			dump($token);
			echo("当前登录用户信息为：<br>");
			dump($user_info);
		}
	}
}