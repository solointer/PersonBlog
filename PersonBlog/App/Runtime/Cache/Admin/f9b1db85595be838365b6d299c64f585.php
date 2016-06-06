<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="<?php echo U('Admin/Blog/dealwithAlter');?>" method="post">
	<table width="700px" border="1" cellspacing="0" cellpadding="10" align="center">
		<h1>博客全文浏览</h1>
		<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>
			<td>ID</td>
			<td><input type="text" name="articleid" value="<?php echo ($v["articleid"]); ?>"></td>
		<tr>
		<tr>
			<td>标题</td>
			<td><input type="text" name="title" value="<?php echo ($v["title"]); ?>"></td>
		</tr>
		<tr>
			<td>点击次数</td>
			<td><input type="text" name="click" value="<?php echo ($v["click"]); ?>"></td>
		</tr>
		<tr>
			<td>发布时间</td>
			<td><input type="text" name="time" value="<?php echo (date('y-m-d H:i',$v["time"])); ?>"></td>
		</tr>
		<tr>
			<!--
			<td>所属分类</td>
				<td><select name="assortmentid">
					<option value=""><?php echo ($v["cate"]["name"]); ?></option>
					<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["assortmentid"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
				</select></td>-->
		<td>所属类型</td>
			<td><input type="text" name="assortmentid" value="<?php echo ($v["cate"]["name"]); ?>"></td>
		</tr>
		<tr>
			<td>文章属性</td>
			<td>
				<?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$h): ?><input type="text" name="attrid[]"value="<?php echo ($h["attrid"]); ?>"><?php echo ($h["name"]); endforeach; endif; ?>
			</td>
		</tr>
		<tr>
			<td>文章内容</td>
			<td><textarea rows="10" cols="30" name="content"><?php echo ($v["content"]); ?></textarea></td><?php endforeach; endif; ?>
		</tr>
			<td colspan="2" align="center">
			<input type="submit" value="保存修改">
			<input type="reset" value="取消修改">
				
			</td>
		</tr>
	</table>
	</form>
</body>
</html>