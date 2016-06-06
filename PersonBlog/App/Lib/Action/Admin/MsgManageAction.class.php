<?php
class MsgManageAction extends CommonAction{
	function index(){
		import('ORG.Util.Page');
		//参数为总共的条数和每一页多少条
		$count=M('wish')->count();
		$page=new Page($count,7);
		//0,$count;
		$limit=$page->firstRow.','.$page->listRows;
		$wish=M('wish')->order('time DESC')->limit($limit)->select();
		//var_dump($wish);
		$this->wish=$wish;
		//吧分页传到前台
		$this->page=$page->show();
		//die;
		$this->display();
	}
	function delete()
	{
		$id=I('id','','intval');
		echo $id;
		if(M('wish')->where(array('attrid'=>$id))->delete())
		{
			$this->success('删除成功',U('Admin/MsgManage/index'));
		}
		else
		{
			$this->error('删除失败');
		}
		//上面也可以写成M('wish')->delete($id);
		
	}
	function read()
	{
		$id=I('id','','intval');
		if(M('wish')->where(array('id'=>$id))->select())
		{
			$this->success('查询成功',U('Admin/MsgManage/index'));
		}
		else
		{
			$this->error('删除失败');
		}
		
	}
}
?>