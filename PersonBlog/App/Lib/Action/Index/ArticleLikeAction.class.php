<?php
class ArticleLikeAction extends Action
{
	function index()
	{
		header("Content-Type: text/plain;charset=utf-8"); 
		  header("Cache-Control: no-cache");
		  $articleid=$_POST['articleid'];
		 // var_dump($_POST);
		  if($_POST['clickid']=='btnBury')
		{
			$where=array('recycle'=>0,'articleid'=>$articleid);
			
			M('article')->where($where)->setInc('dislikenumber');
			$info=M('article')->where($where)->select();
			echo "". $info[0]['dislikenumber'];
		}
		if($_POST['clickid']=='btnDigg')
		{
			$where=array('recycle'=>0,'articleid'=>$articleid);			
			M('article')->where($where)->setInc('likenumber');
			$info=M('article')->where($where)->select();
			echo "". $info[0]['likenumber'];
			
		}
		
	}
}
?>
