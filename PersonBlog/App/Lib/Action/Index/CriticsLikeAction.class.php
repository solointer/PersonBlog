<?php
class CriticsLikeAction extends Action{
	 function countContentLike()
	{
		header("Content-Type: text/plain;charset=utf-8"); 
		 if ($_SERVER["REQUEST_METHOD"] == "POST"&&$_POST['replyobject']==""){
		$id=$_POST['criticsid'];
		$where=array('criticsid'=>$id);
		$data=array(
		'likenumber'=>$_POST["likenumber"],	
		);
		$save_num=M('critics')->where($where)->save($data); 
		
		 }
		 else
		 {
			$id=$_POST['replyid'];
			$where=array('replyid'=>$id);
			 $data=array(
			'likenumber'=>$_POST["likenumber"],	
		);
		$save_num=M('reply')->where($where)->save($data); 
		 }
	}
}
?>