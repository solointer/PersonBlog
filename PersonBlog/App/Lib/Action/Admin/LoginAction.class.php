<?php
class LoginAction extends Action{
	
	 public function index(){
		//echo  C('Username');
		//echo "这是后台";
		//echo '<br/>';
		//echo  C('Admin');
		//say();
		//显示登陆视图
		//var_dump(session_id());
		//die;
		$this->display();
	}
	public function verify(){
		 ob_clean();
		//导入验证码的类
		import('ORG.Util.Image');
		//第一个是验证码的位数，er是类型
		Image::buildImageVerify(1,1,'png');
	}
	public function login(){
		
		if(!IS_POST) halt('此页面不存在');
		
		if(I('code','','md5')!=session('verify')){
			$this->error('验证码错误');
		}
		else{

			$username=I('username');
			$password=I('password','','md5');
			$user=M('user')->where(array('username'=>$username))->find();
			if(!$user||$user['password']!=$password)
			{
				$this->error('用户名或密码错误');
			}
			$data=array(
			'id'=>$user['id'],
			'logintime'=>time(),
			'logip'=>get_client_ip(),
			);
			//将用户的id写入数据库
			M('user')->save($data);
			session('uid',$user['id']);
			session('username',$user['username']);
			session('logintime',date('Y-m-d H:i:s',$user['logintime']));
			session('loginip',$user['loginip']);
			$this->redirect('Admin/Index/index');
			//var_dump($data);
		}
		//默认会话里的是用md5函数加密的
		//echo $_SESSION['verify'];
		//echo '<br>';
		//echo 'password:';
		//echo md5($_POST['code']);
		
	}
}
?>