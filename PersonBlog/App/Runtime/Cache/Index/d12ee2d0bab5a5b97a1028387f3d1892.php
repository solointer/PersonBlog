<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style type="text/css">
.wrap{
	width:100%;
	height:200px;
	
}
.wrap .content_pic{
	float: left;
	width:30%;
	height: 100%;
	text-align: center;

}
.wrap .content_pic img{
	margin-top:30px;
	width:90%;
	height:80%;

	
}

.wrap .content {
	float: right;
	width:70%;
	height: 100%;
	font-size: 16px;
    font-weight: bold;
	font-family:"Microsoft YaHei";



}
p{margin-top: 40px;}
#head{
	font-size: 16px;
    font-weight: bold;
	font-family:"Microsoft YaHei";
}
</style>
<body>
<?php if(is_array($info)): foreach($info as $key=>$v): ?><div class="wrap">
	<div class="content_pic">
		<img src="__PUBLIC__/images/bj4_7.jpg"  alt="">
	</div>
		<div class="content">
		<p id="head"><a href="<?php echo U('Index/Homepage/articlepage',array('id'=>$v['articleid']));?>"><?php echo ($v["title"]); ?></a></p>
			<p><?php echo ($v["introduce"]); ?></p>
		</div>
		
	</div><?php endforeach; endif; ?>
</body>
</html>