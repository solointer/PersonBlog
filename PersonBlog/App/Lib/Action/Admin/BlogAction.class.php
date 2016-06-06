<?php
class BlogAction extends CommonAction{
	//显示博文的列表
	public function index(){
		$where=array('recycle'=>0);
		$this->info=D('ArticleRelation')->relation(true)->where($where)->select();
		//$info=D('ArticleRelation')->relation(true)->where($where)->select();
	//var_dump($info[0][attr]);
		//die;
		$this->display();
	}
	//添加博文
	public function blog()
	{
		$this->cate=M('cate')->order('sort')->select();
		$this->attr=M('attr')->order('attrid')->select();
		$this->display();
	}
	//处理添加博文表单的处理
	public function addBlog()
	{
		//var_dump($_POST);
		
		$data=array(
		'title'=>$_POST['title'],
		'content'=>$_POST['content'],
		'author'=>$_POST['author'],
		'introduce'=>$_POST['introduce'],
		'time'=>time(),
		'click'=>$_POST['click'],
		'assortmentid'=>$_POST['assortmentid'],
		);
		
		if(isset($_POST[attrid]))
		{
			foreach($_POST['attrid'] as $v)
			{
				$data[attr][]=$v;
			}
		}
		$info=D('ArticleRelation')->relation(true)->add($data);
		//var_dump($info);
	$this->display();
	//编辑器图片的上传处理
	}
	//展示所有的文章
	public function showAllArticle()
	{
		$id=I('articleid');
		//var_dump($id);
		$where=array('articleid'=>$id);
		$this->info=D('ArticleRelation')->relation(true)->where($where)->select();
		//var_dump($info);
		$this->display();
	}
	public function deleteArticle(){
		$id=I('articleid');
		$article=M('article');
		$data['recycle']='1';
		$where=array('del'=>0,'articleid'=>$id);
		if($article->where($where)->save($data))
		{
			$this->success('删除成功',U('Admin/Blog/index'));
		}
		else{
			 $this->error('删除失败');
		}
		//var_dump($info);
	}
	//读取要修改的文章
	public function alterArticle(){
		$id=I('articleid');
		$where=array('del'=>0,'articleid'=>$id);
		$this->info=D('ArticleRelation')->relation(true)->where($where)->select();
		//var_dump($info);
		$this->display();
	}
	//将修改后的文章存储
	public function dealwithAlter()
	{
		//var_dump($_POST);
		$id=I('articleid');
		$data=array(
		'title'=>$_POST['title'],
		'content'=>$_POST['content'],
		'time'=>time(),
		'click'=>$_POST['click'],
		'assortmentid'=>$_POST['assortmentid'],
		);
		
		if(isset($_POST[attrid]))
		{
			
			foreach($_POST['attrid'] as $v)
			{
				$data[attr][]=$v;
			}
		}
		$where=array('del'=>0,'articleid'=>$id);
		//var_dump($data);
		$info=D('ArticleRelation')->relation(true)->where($where)->save($data);
		if($info)
		{
			$this->success('修改成功',U('Admin/Blog/index'));
		}
		else
		{
			 $this->error('修改失败');
		}
	//$this->display();
	//编辑器图片的上传处理
	}
	public function recycle()
	{
		$where=array('recycle'=>1);
		$this->info=D('ArticleRelation')->relation(true)->where($where)->select();
		
		
		$this->display();
	}
	public function upload()
	{
		import('ORG.Net.UploadFile');
		/*$config =   array(
        'maxSize'           =>  -1,    // 上传文件的最大值
        'supportMulti'      =>  true,    // 是否支持多文件上传
        'allowExts'         =>  array(),    // 允许上传的文件后缀 留空不作后缀检查
        'allowTypes'        =>  array(),    // 允许上传的文件类型 留空不做检查
        'thumb'             =>  false,    // 使用对上传图片进行缩略图处理
        'imageClassPath'    =>  'ORG.Util.Image',    // 图库类包路径
        'thumbMaxWidth'     =>  '',// 缩略图最大宽度
        'thumbMaxHeight'    =>  '',// 缩略图最大高度
        'thumbPrefix'       =>  'thumb_',// 缩略图前缀
        'thumbSuffix'       =>  '',
        'thumbPath'         =>  '',// 缩略图保存路径
        'thumbFile'         =>  '',// 缩略图文件名
        'thumbExt'          =>  '',// 缩略图扩展名        
        'thumbRemoveOrigin' =>  false,// 是否移除原图
        'thumbType'         =>  1, // 缩略图生成方式 1 按设置大小截取 0 按原图等比例缩略
        'zipImages'         =>  false,// 压缩图片文件上传
        'autoSub'           =>  true,// 启用子目录保存文件
        'subType'           =>  'date',// 子目录创建方式 可以使用hash date custom
        'subDir'            =>  '', // 子目录名称 subType为custom方式后有效
        'dateFormat'        =>  'Ymd',
        'hashLevel'         =>  1, // hash的目录层次
        'savePath'          =>  '',// 上传文件保存路径
        'autoCheck'         =>  true, // 是否自动检查附件
        'uploadReplace'     =>  false,// 存在同名是否覆盖
        'saveRule'          =>  'uniqid',// 上传文件命名规则
        'hashType'          =>  'md5_file',// 上传文件Hash规则函数名
        );*/
//图片处理类的实例化对象
		//$upload=new UploadFile($config);
		//把文件上传到哪里,返回真或假
		$upload=new UploadFile();
		$upload->autoSub=true;
		$upload->subType='date';
		$upload->dataFormat='Ymd';
		
		 if($upload->upload()){
         $info = $upload->getUploadFileInfo();
         echo json_encode(array(
          'url'=>$info[0]['savename'],
          'title'=>htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
          'original'=>$info[0]['name'],
          'state'=>'SUCCESS'
         ));
       }else{
         echo json_encode(array(
         'state'=>$upload->getErrorMsg()
         ));
           }
 
		if($upload->upload('./Uploads/'))
		{
			//上传文件的信息
			$info=$upload->getUploadFileInfo();
			//var_dump($info);
			echo json_encode(
			array(
			'url'=> __ROOT__.'/Uploads/'.$info[0]['savename'],
			'title'=>htmlspecialchars($_POST['pictitle'],ENT_QUOTES),
			'original'=>$info[0]['name'],
			'state'=>'SUCCESS',
			)
			);
		}
		else
		{
			echo json_encode(array(
			'state'=>$upload->getErrorMsg(),
			));
		}
		//也可以通过对象调用配置目录$upload->autoCheck=true;
		/*{
     *   'url'      :'a.jpg',   //保存后的文件路径
     *   'title'    :'hello',   //文件描述，对图片来说在前端会添加到title属性上
     *   'original' :'b.jpg',   //原始文件名
     *   'state'    :'SUCCESS'  //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
     * }*/
    // echo "{'url':'" . $info["url"] . "','title':'" . $title . "','original':'" . $info["originalName"] . "','state':'" . $info["state"] . "'}";

	}
	
}
?>