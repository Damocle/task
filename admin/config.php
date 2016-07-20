<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>数据库配置信息</title>
	<link rel="stylesheet" href="style/teb.css">
</head>
<body>
	<div class="containter">
		<div class="top">请填写数据库配置信息！！！<a class="x" href="#"></a></div>
		<div class="bottom">
			<p>
				<form action="config.handle.php" method="post">
					<table>
						<tr>
							<td>数据库主机名：</td>
							<td><input type="text" name="host" value="localhost"></td>
						</tr>
						<tr>
							<td>数据库用户：</td>
							<td><input type="text" name="user" value="root"></td>
						</tr>
						<tr>
							<td>数据库密码：</td>
							<td><input type="password" name="pwd" value="" placeholder="请输入你的数据库密码"></td>
						</tr>
						<tr>
							<td>数据库名：</td>
							<td><input type="text" name="db" value="attr"></td>
						</tr>
					</table>	
			</p>
					<input type="submit" class="btn" name="submit" value="提交">
			</form>
		</div>
	</div>
</body>
</html>