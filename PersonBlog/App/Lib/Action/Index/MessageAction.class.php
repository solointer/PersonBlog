<?php
class MessageAction extends Action
{
	function index()
	{
		import('ORG.Util.Page');
		//参数为总共的条数和每一页多少条
		$count=M('wish')->count();
		$page=new Page($count,3);
		//0,$count;
		$limit=$page->firstRow.','.$page->listRows;
		$wish=M('wish')->order('time DESC')->limit($limit)->select();
		//var_dump($wish);
		$this->date=$wish;
		//吧分页传到前台
		$this->page=$page->show();
		//die;
		$this->display();
	}
	function writemessage()
	{
		header("Content-Type: text/plain;charset=utf-8"); 
		
		 if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$data=array(
		'username'=>$_POST['username'],
		'content'=>$_POST["content"],
		'time'=>$_POST["time"],	
		);
		//将信息存入留言表
		//var_dump($data);
		$info=M('wish')->add($data);
		$date=M('wish')->select();
		
		$a=json_encode($date);
		echo '{"aa":'.$a.'}';
	}
	}
}
?>