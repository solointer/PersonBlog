<?php
class RbacAction extends CommonAction{
	
	public function index(){
		
	}
	public function role(){
		$this->role=M('role')->select();
		
		$this->display();
	}
	public function node(){
		
	}
	public function addUser(){
		
	}
	public function addRole(){
		$this->display();
	}
	//添加角色的处理
	public function addRoleHandle()
	{
		var_dump($_POST);
		
		if(M('role')->add($_POST))
		{
			$this->success('添加成功',U('Admin/Rbac/role'));
		}
		else
		{
			$this->error('添加失败');
		}
	}
	public function addNode(){
		
	}
}
?>