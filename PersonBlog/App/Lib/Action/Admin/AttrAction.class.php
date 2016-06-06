<?php
class AttrAction extends CommonAction
{
	public function index()
	{
		$this->attr=M('attr')->select();
		
		$this->display();
	}
}
?>