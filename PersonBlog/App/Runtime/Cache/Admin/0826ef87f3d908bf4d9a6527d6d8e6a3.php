<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form method="post" action="<?php echo U('Admin/Rbac/addRoleHandle');?>">
	<table width="700px" align="center">
		<tr>
			<th colspan="2">添加角色</th>
		</tr>
		<tr>
			<td align="right">角色名称</td>
			<td>
				<input type="text" name="name"/>
			</td>
		</tr>
		<tr>
			
				<td align="right">角色描述</td>
			
			<td>
				<input type="text" name="remark"/>
			</td>
		</tr>
		<tr>
			<td align="right">是否开启:</td>
			<td>
				<input type="radio" name="status" value="1" checked="checked" />&nbsp;开启&nbsp;
				<input type="radio" name="status" value="0" />&nbsp;关闭&nbsp;
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value="添加保存"/>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>