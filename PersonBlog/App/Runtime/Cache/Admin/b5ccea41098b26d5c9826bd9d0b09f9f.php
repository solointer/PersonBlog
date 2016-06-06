<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table width="700px" border="1" cellspacing="0" cellpadding="10" align="center">
		<h1>博客全文浏览</h1>
		<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
			<td>ID</td>
			<td><?php echo ($v["articleid"]); ?></td>
		<tr>
		<tr>
			<td>标题</td>
			<td><?php echo ($v["title"]); ?></td>
		</tr>
		<tr>
			<td>点击次数</td>
			<td><?php echo ($v["click"]); ?></td>
		</tr>
		<tr>
			<td>发布时间</td>
			<td><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
		</tr>
		<tr>
			<td>所属类型</td>
			<td><?php echo ($v["cate"]["name"]); ?></td>
		</tr>
		<tr>
			<td>文章属性</td>
			<td>
				<?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$h): ?><strong><?php echo ($h["name"]); ?></strong>
					<div><?php echo ($h["color"]); ?></div><?php endforeach; endif; ?>
			</td>
		</tr>
		<tr>
			<td>文章内容</td>
			<td><?php echo ($v["content"]); ?></td><?php endforeach; endif; ?>
		</tr>
			<td>
				<a href="<?php echo U('Admin/Blog/index');?>">返回上一级</a>
				
			</td>
		</tr>
	</table>
</body>
</html>