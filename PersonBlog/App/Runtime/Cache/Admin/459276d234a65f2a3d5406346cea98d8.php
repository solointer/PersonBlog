<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="<?php echo U('Admin/Category/sortCate');?>" method="post">
	<table width="700px" border="1" cellspacing="0" cellpadding="10">
		<tr>
			<td>ID</td>
			<td>名称</td>
			<td>父类</td>
			<td>排序</td>
			<td>操作</td>
		</tr>
		<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr>
		 	<td><?php echo ($v["assortmentid"]); ?></td>
		 	<td><?php echo ($v["name"]); ?></td>
		 	<td><?php echo ($v["pid"]); ?></td>
		 	<td><input type="text" name="<?php echo ($v["assortmentid"]); ?>" value="<?php echo ($v["sort"]); ?>"></td>
		 	
		 	
		 	<td>
		 		<a href="<?php echo U('Admin/Category/addCate',array('pid'=>$v['assortmentid']));?>">添加子分类</a>
		 		<a href="<?php echo U('Admin/MsgManage/alter',array('id'=>$v['id']));?>">修改子分类</a>
		 		<a href="<?php echo U('Admin/MsgManage/delete',array('id'=>$v['id']));?>">删除</a>
		 	</td>
		 </tr><?php endforeach; endif; ?>
			<tr >
		 <td colspan="5">
		 	<input type="submit" value="排序">
		 </td>
		 	
		 </tr>
	</table>
	</form>
</body>
</html>