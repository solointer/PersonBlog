<?php
class CriticsAction extends CommonAction{
	//将关于评论的数据存入评论表
	public function criticsHandle()
	{
		header("Content-Type: text/plain;charset=utf-8"); 
		
		 if ($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['replyobject']==""){
		$data=array(
		'userid'=>$_POST["userid"],
		'criticstime'=>$_POST["criticstime"],
		'criticscontent'=>$_POST["criticscontent"],
		'username'=>$_POST["username"] ,
		'replyobject'=>$_POST["replyobject"],
		);
		//将信息存入评论表
		$info=M('critics')->add($data);
		//var_dump($info);
		$date=array(
		'criticsid'=>$info,
		'articleid'=>$_POST["articleid"],
		);
		//var_dump($date);
		//将信息存入评论-文章表
		$info2=M('critics_article')->add($date);
		//将信息存入评论表		
		//将文章的评论数加1
		$where1=array('articleid'=>'$_POST["articleid"]');
		M('article')->where($where1)->setInc('readnumber');
	
	}
	else
	{
		$data3=array(
		'userid'=>$_POST["userid"],
		'criticsid'=>$_POST['criticsid'],
		'replycontent'=>$_POST["criticscontent"],
		'replyobject'=>$_POST["replyobject"],
		);
		$info3=M('reply')->add($data3);
	}
	}
	
	//显示评论的列表
	 function showAllContent()
	{
			$this->info=M('critics')->select();
			//var_dump($info);
			$this->display();
	}
	 function deleteContent()
	{
		$id=I('criticsid');
		$where=array('criticsid'=>$id);
		$data=M('critics')->where($where)->delete();
		if($data)
		{
			$this->success('删除成功',U('Admin/Critics/showAllContent'));
		}
		else
		{
			 $this->error('删除失败');
		}
	}
	//展示当前评论的子评论
	function chridrenContent()
	{
		$id=I('criticsid');
		$where=array('criticsid'=>$id);
		$this->data=M('reply')->where($where)->select();
		$this->display();
	}
	//删除子评论
	function deletereply()
	{
		$id=I('replyid');
		$where=array('replyid'=>$id);
		$data=M('reply')->where($where)->delete();
		if($data)
		{
			$this->success('删除成功',U('Admin/Critics/showAllContent'));
		}
		else
		{
			 $this->error('删除失败');
		}
	}

}
?>