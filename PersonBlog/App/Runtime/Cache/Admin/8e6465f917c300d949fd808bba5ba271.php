<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<td>ID</td>
			<th>角色名称</th>
			<th>角色描述</th>
			<th>角色开启状态</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<th><?php echo ($v["name"]); ?></th>
			<th><?php echo ($v["remark"]); ?></th>
			<th>
				<?php if($v["status"]): ?>开启
				<?php else: ?>
				关闭<?php endif; ?>
			</th>
			<th><a href="">配置权限</a></th>
			<th><?php echo ($v["id"]); ?></th>
		</tr><?php endforeach; endif; ?>

	</table>
</body>
</html>