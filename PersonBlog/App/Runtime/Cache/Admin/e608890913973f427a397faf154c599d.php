<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table width="800px" border="1" cellspacing="0" cellpadding="10" align="center">
		<tr>
			<td>ID</td>
			<td>标题</td>
			<td>点击次数</td>
			<td>发布时间</td>
			<td>所属类型</td>
			<td>文章属性</td>
			<td>操作</td>
		</tr>
		<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
			<td><?php echo ($v["articleid"]); ?></td>
			<td><?php echo ($v["title"]); ?></td>
			<td><?php echo ($v["click"]); ?></td>
			<td><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
			<td>
				<?php echo ($v["cate"]["name"]); ?>
			</td>
			<td>
				<?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$h): ?><strong><?php echo ($h["name"]); ?></strong>
					<div><?php echo ($h["color"]); ?></div><?php endforeach; endif; ?>
			</td>
			<td>
				<a href="<?php echo U('Admin/Blog/showAllArticle',array('articleid'=>$v['articleid']));?>">查看全文</a>
			</td>
		</tr><?php endforeach; endif; ?>
	</table>
</body>
</html>