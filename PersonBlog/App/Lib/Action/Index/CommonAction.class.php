<?php
class CommonAction extends Action{
	public function _initialize(){
		//���û�û�е�½��ֱ�ӷ��ʺ�̨��������ʱ��
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