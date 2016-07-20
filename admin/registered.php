<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>账户注册</title>
	<link rel="stylesheet" href="style/teb.css">
</head>
<body>
	<div class="containter">
		<div class="top">管理账户注册<a class="x" href="#"></a></div>
		<div class="bottom">
			<p>
				<form action="registered.handle.php" method="post">
					<table>
						<tr>
							<td>用户名：</td>
							<td><input type="text" name="username" value=""></td>
						</tr>
						<tr>
							<td>密码：</td>
							<td><input type="password" name="password" value=""></td>
						</tr>
						<tr>
							<td>确认密码：</td>
							<td><input type="password" name="repeatpwd" value=""></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn" name="submit" value="提交"></td>
						</tr>
					</table>	
			
					
				</form>
			</p>
		</div>
	</div>
</body>
</html>