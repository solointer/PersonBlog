<?php
class InquireAction extends Action{
	 function showInquireArticle()
	{
		$data=I('search');
		//var_dump($data);
		$keywords = '%'.$data.'%'; 
		$where['title|introduce'] = array('like',$keywords);  
		$this->info = M('article')->where($where)->select();
		//var_dump($info);
		//die;
		$this->display();
	}
}
?>