<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form method="post" action="<?php echo U('Admin/Category/runAddCate');?>">
<table width="700px" cellpadding="5" border="1">
	<tr>
		<th colspan="2">添加分类</th>
	</tr>
	<tr>
		<td>添加类型</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>
		<td>排序</td>
		<td><input type="text" name="sort" value="100"></td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
			<input type="submit" value="添加保存">
		</td>
	</tr>
</table>
	</form>
</body>
</html>