<?php
class CommentSortAction extends Action
{
	function commentNumberSort()
	{
		header("Content-Type: text/plain;charset=utf-8"); 
		  header("Cache-Control: no-cache");
		if($_POST['clickid']=='readNumber')
		{
			$where=array('recycle'=>0);
			$info=M('article')->where($where)->order('readnumber')->select();
			$a=json_encode($info);
			echo '{"aa":'.$a.'}';
			
		}
		if($_POST['clickid']=='likeNumber')
		{
			$where=array('recycle'=>0);
			$info=M('article')->where($where)->order('likenumber')->select();
			$a=json_encode($info);
			echo '{"aa":'.$a.'}';
			
		}
		if($_POST['clickid']=='timeNumber')
		{
			$where=array('recycle'=>0);
			$info=M('article')->where($where)->order('time')->select();
			$a=json_encode($info);
			echo '{"aa":'.$a.'}';
			
		}
		if($_POST['clickid']=='commentNumber')
		{
			$where=array('recycle'=>0);
			$info=M('article')->where($where)->order('commentnumber')->select();
			$a=json_encode($info);
			echo '{"aa":'.$a.'}';
			
		}
		
	}
}
?>