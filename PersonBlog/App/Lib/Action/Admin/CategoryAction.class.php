<?php
 class CategoryAction extends CommonAction{
	 public function index()
	 {
		 $cate=M('cate')->order('sort')->select();
		 $this->cate=$cate;
		 //$this->assign('cate',$cate)->display();
		 $this->display();
	 }
	 public function addCate()
	 {
		 //intavl函数是为了转化为整形
		 $this->pid=I('pid',0,'intval');
		 $this->display();
	 }
	 public function sortCate()
	 {
		 //var_dump($_POST);
		 $db=M('cate');
		 foreach($_POST as $id=>$sort)
		 {
			 $db->where(array('assortmentid'=>$id))->setField('sort',$sort);
		 }
		 $this->redirect('Admin/Category/index');
	 }
	 //加入数据库
	 public function runAddCate()
	 {
		 //var_dump($_POST);
		 if(M('cate')->add($_POST))
		 {
			 $this->success('添加成功',U('Admin/Category/index'));
		 }
		 else
		 {
			 $this->error('添加失败');
		 }
		 
	 }
	 
 }
?>