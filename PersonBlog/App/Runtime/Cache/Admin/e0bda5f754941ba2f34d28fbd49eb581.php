<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style type="text/css">
	table{
		margin-top: 100px;
	}
</style>
<body>
<div>
	<form action="<?php echo U('Admin/Login/login');?>" method="post">
	<table border="1" cellpadding="10" width="600" align="center">
		<tr>
			<td>账号</td>
			<td><input type="username" name="username"></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>验证码</td>
			<td>
				<input type="code" name="code"/><img src="<?php echo U('Admin/Login/verify');?>" id="code"><a href="javascript:void(change_code(this));"></a>
			</td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" value="登陆"/>
			<input type="reset" value="取消">	
		</tr>
	</table>
	<!--
		<p>账号</p><input type="username" name="username">
		<p>密码</p><input type="password" name="password">
		
		<p>验证码</p><input type="code" name="code"/><img src="<?php echo U('Admin/Login/verify');?>" id="code"><a href="javascript:void(change_code(this));"></a>
		<input type="submit" value="登陆">
		-->
	</form>
</div>
</body>
<script type="text/javascript">
	
</script>
</html>