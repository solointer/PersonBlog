<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style type="text/css">
*{
	margin:0px;
	padding: 0px;
}

	h1 {
    font-size: 30px;
    font-weight: 700;
    text-shadow: 0 1px 4px rgba(0,0,0,.2);
    margin-top: 30px;
    margin-left: 40px;
    color: white;
}
	body{
		width: 100%;
		height: 100%;
		background: url("__PUBLIC__/images/1.jpg");
		background-size: cover;

		
	}
	
		input {
    width: 270px;
    height: 42px;
    margin-top: 25px;
    padding: 0 15px;
    border-radius: 6px;
    background: rgba(45,45,45,.15);
    font-size: 14px;
    color: #fff;

	}
.wrap{
	width: 500px;
	height: 500px;
	
	margin: 0 auto;
	margin-top: 50px;

}
button {
    cursor: pointer;
    width: 300px;
    height: 44px;
    margin-top: 25px;
    padding: 0;
    background: #ef4300;
    border-radius: 6px;
    border: 1px solid #ff730e;
    color: #fff;
    text-shadow:0 1px 2px rgba(0,0,0,1);
}
</style>
<body>
	<div class="wrap">
		<form action="<?php echo U('Index/Homepage/loginHandle');?>" method="post">
		<h1>LOGIN</h1>
			<input type="text" name="username" class="username" placeholder="Username">
			<input type="password" name="password" class="password" placeholder="Password">
			<button type="submit">Sign me in</button>
<!--
			<a href="javascript:history.go(-1);">向上一页</a>-->
		</form>
	</div>
</body>
</html>