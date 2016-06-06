<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table width="900px" border="1" cellspacing="0" cellpadding="10">
		<tr>
			<td>回复者ID</td>
			<td>用户ID</td>
			<td>用户名</td>
			<td>评论者ID</td>
			<td>回复内容</td>
			
			<td>评论对象</td>
			<td>操作</td>
			
		</tr>
		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
		 	<td><?php echo ($v["replyid"]); ?></td>
		 	<td><?php echo ($v["userid"]); ?></td>
		 	<td><?php echo ($v["username"]); ?></td>
		 	 <td><?php echo ($v["criticsid"]); ?></td>
		 	  	<td><?php echo ($v["replycontent"]); ?></td>
		 	  	
		 	  	 	<td><?php echo ($v["replyobject"]); ?></td>
		 	<td><a href="<?php echo U('Admin/Critics/deletereply',array('replyid'=>$v['replyid']));?>">删除</a>
		 
		 	
		 </tr><?php endforeach; endif; ?>
			
		
		 	
		 
	</table>
	</form>
</body>
</html>