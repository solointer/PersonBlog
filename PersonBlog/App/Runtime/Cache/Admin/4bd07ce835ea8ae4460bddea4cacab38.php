<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css">
</head>
<body>
	<table width="700px" border="1" cellspacing="0" cellpadding="10" align="center">
		<tr>
			<th>ID</th>
			<th>留言者</th>
			<th>留言内容</th>
			<th>留言时间</th>
			<th>操作</th>

		</tr>
		 <?php if(is_array($wish)): foreach($wish as $key=>$v): ?><tr>
		 	<td><?php echo ($v["attrid"]); ?></td>
		 	<td><?php echo ($v["username"]); ?></td>
		 	<td><?php echo ($v["content"]); ?></td>
		 	<td><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
		 	<td>
		 		<a href="<?php echo U('Admin/MsgManage/delete',array('id'=>$v['attrid']));?>">删除</a>
		 		<a href="">回复</a>
		 	</td>
		 </tr><?php endforeach; endif; ?>
	<tr>
		<td colspan="5" align="center"><?php echo ($page); ?></td>
	</tr>
	</table>
</body>
</html>