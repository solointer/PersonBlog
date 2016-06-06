<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table width="700px" border="1" cellspacing="0" cellpadding="10">
		<tr>
			<td>ID</td>
			<td>名称</td>
			<td>颜色</td>
			<td>操作</td>
			
		</tr>
		<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr>
		 	<td><?php echo ($v["attrid"]); ?></td>
		 	<td><?php echo ($v["name"]); ?></td>
		 	<td><?php echo ($v["color"]); ?></td>
		 	<td><a href="">添加属性</a>
		 	<a href="">修改属性</a>
		 	<a href="">删除属性</a></td>
		 	
		 	
		 	
		 </tr><?php endforeach; endif; ?>
			
		
		 	
		 
	</table>
	</form>
</body>
</html>