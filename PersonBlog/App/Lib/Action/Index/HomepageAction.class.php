<?php
class HomepageAction extends Action{
	public function homepage()
	{
		$where=array('recycle'=>0);
		$this->info=D('ArticleRelation')->relation(true)->where($where)->select();
		$this->data=M('cate')->order('sort')->select();
		$this->display();
	}
	//浏览当前的文章
	public function articlepage()
	{
		$i=0;
	$articleid=I('id');
	//var_dump($articleid);
	$where1=array('recycle'=>0,'articleid'=>$articleid);
	$this->info=D('ArticleRelation')->relation(true)->where($where1)->select();
	//var_dump($info)
	//先利用文章编号得到评论的编号
	$where2=array('articleid'=>$articleid);
	$commentid=M('critics_article')->where($where2)->select();
	//$data1=array();
	foreach($commentid as $v)
			{
				
				$where3=array('criticsid'=>$v['criticsid']);
				$data1[]=M('critics')->where($where3)->select();
				$data1[$i][0][replycontent]=M('reply')->where($where3)->select();
				$i++;
				//$data[attr]=$v;
			}
	
	
	//var_dump($data1[4]);
	//	var_dump($data2);
	//die;
	//当点击浏览全文的时候，文章浏览数加一
	M('article')->where($where1)->setInc('readnumber');
	$this->data=$data1;
	//$this->reply=$data2;
	$this->display();
	}
	//展示这个类型的文章
	public function showThisCateArticle()
	{
		$id=I('id');
		$where1=array('recycle'=>0,'assortmentid'=>$id);
		//读取当前分类的文章
		$this->info=D('ArticleRelation')->relation(true)->where($where1)->select();
		
		$where2=array('pid'=>$id);
		$this->dataonly=M('cate')->where($where2)->order('sort')->select();
		//var_dump($id);
		//var_dump($dataonly);
		$this->data=M('cate')->order('sort')->select();
		//die();
		$this->display();
		//下面来处理这一页的排序
		
	}
	public function login()
	{
		
		
		$this->display();
	}
	
	//处理登陆页面传回的数据
	public function loginHandle()
	{
		if(!IS_POST) halt('此页面不存在');
		
		//if(I('code','','md5')!=session('verify')){
		//	$this->error('验证码错误');
		//}
		else{

			$username=I('username');
			$password=I('password','','md5');
			$user=M('user')->where(array('username'=>$username))->find();
			if(!$user||$user['password']!=$password)
			{
				$this->error('用户名或密码错误');
			}
			$data=array(
			'id'=>$user['id'],
			'logintime'=>time(),
			'logip'=>get_client_ip(),
			);
			//将用户的id写入数据库
			M('user')->save($data);
			session('uid',$user['id']);
			session('username',$user['username']);
			session('logintime',date('Y-m-d H:i:s',$user['logintime']));
			session('loginip',$user['loginip']);
			//记录文章的访问次数
			$this->redirect('Index/Homepage/articlepage');
			//var_dump($data);
		}
	}
}
?>