<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="__ROOT__/Data/Ueditor/ueditor.config.js"></script>

	<script type="text/javascript" src="__ROOT__/Data/Ueditor/ueditor.all.
	js"></script>
		<script type="text/javascript">
		   
	window.UEDITOR_HOME_URL='__ROOT__/Data/Ueditor/';
	
	 //修改图片的提交地址
	// window.UEDITOR_CONFIG.savePath="__ROOT__/Uploads/";
	
	 
	
	window.onload=function(){
		window.UEDITOR_CONFIG.savePath= ['Uploads'];
		 window.UEDITOR_CONFIG.imageUrl="<?php echo U('Admin/Blog/upload');?>";
		  window.UEDITOR_CONFIG.imagePath=" __ROOT__/Uploads/";
		   UE.getEditor('content',{initialFrameHeight:500});

	}

	</script>
</head>
<body>
<form action="<?php echo U('Admin/Blog/addBlog');?>" method="post">
	<table width="1000px" border="1" cellspacing="0" cellpadding="10" align="center">
		<tr>
			<th colspan="2">博文发布</th>
		</tr>
		
		<tr>
				<td>所属分类</td>
				<td><select name="assortmentid">
					<option value="">请选择分类</option>
					<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["assortmentid"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
				</select></td>
		</tr>
		<tr>
		
			<td>博文属性</td>
			<td><?php if(is_array($attr)): foreach($attr as $key=>$v): ?><label>
					<input type="checkbox" name="attrid[]" value="<?php echo ($v["attrid"]); ?>"><?php echo ($v["name"]); ?>
				</label><?php endforeach; endif; ?></td>
		</tr>
		<tr>
		<td>点击量</td>
		<td>
			<input type="text" name="click" value="100">
		</td>

		</tr>
		<tr>
				<td>标题</td>
			<td>
				<input type="text" name="title">
			</td>

		</tr>
		<td>作者</td>
		<td>
			<input type="text" name="author" value="廉恒凯">
		</td>
		
		</tr>
		<td>简介</td>
		<td>
			<input type="text" name="introduce" value="">
		</td>
		
		</tr>
		<tr>
			<th colspan="2"><textarea name="content" id="content"></textarea></th>
		</tr>
		<td colspan="2">
		 	<input type="submit" value="发布">
		 </td>
		 	
	</table>
	</form>
</body>
</html>