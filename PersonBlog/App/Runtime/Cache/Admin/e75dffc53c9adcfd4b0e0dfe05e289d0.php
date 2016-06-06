<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table width="900px" border="1" cellspacing="0" cellpadding="10">
		<tr>
			<td>评论者ID</td>
			<td>用户ID</td>
			<td>用户名</td>
			<td>评论内容</td>
			<td>评论时间</td>
			<td>点赞数</td>
			<td>评论对象</td>
			<td>操作</td>
			
		</tr>
		<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
		 	<td><?php echo ($v["criticsid"]); ?></td>
		 	<td><?php echo ($v["userid"]); ?></td>
		 	<td><?php echo ($v["username"]); ?></td>
		 	 <td><?php echo ($v["criticscontent"]); ?></td>
		 	  	<td><?php echo ($v["criticstime"]); ?></td>
		 	  	<td><?php echo ($v["likenumber"]); ?></td>
		 	  	 	<td><?php echo ($v["replyobject"]); ?></td>
		 	<td><a href="<?php echo U('Admin/Critics/deleteContent',array('criticsid'=>$v['criticsid']));?>">删除</a>
		 <a href="<?php echo U('Admin/Critics/chridrenContent',array('criticsid'=>$v['criticsid']));?>">查看回复</a>
		 	 <a href="<?php echo U('Admin/Critics/chridrenContent',array('criticsid'=>$v['criticsid']));?>">查看评论的文章</a></td>
		 	
		 </tr><?php endforeach; endif; ?>
			
		
		 	
		 
	</table>
	</form>
</body>
</html>