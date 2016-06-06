<?php
class CommonAction extends Action{
	public function _initialize(){
		//当用户没有登陆而直接访问后台管理界面的时候，
		if(!isset($_SESSION['uid'])||!isset($_SESSION['username']))
		{
				$this->redirect('Index/Homepage/articlepage');
		}
	}
	public function logout(){
		session_unset();
		session_destroy();
			$this->redirect('Index/Homepage/articlepage');
	}
}
?>