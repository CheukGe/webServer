<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	<script src="./js/jq.js"></script>
	<script src="./js/index.js"></script>
	<?php
		header("content-type:text/html;charset=utf-8");
		@$username = $_COOKIE['username'];
		@$password = $_COOKIE['password'];
		if($username==""){
	?>
</head>
<body>

	<img src="./image/7a62a9cd86840418c61b41537de1f60e.jpg" width="100%" height="50%" />
	<div id="wrap">
		<li>测试账号:123456或123456@163.com密码:654321</li>
		<li>测试账号:110或110@163.com密码:110</li>
		<li>测试账号:120或120@163.com密码:120</li>
		<?php echo $username;?>
		<a href="#" id="reg">注册</a>
		<a href="#" id="login">登录</a>
			<table style="display: none" id="regtable">
				<form action="./php/reg.php" method="post">
					<tr>
						<td width="40%" align="right">*用户名：</td>
						<td width="60%" align="left"><input type="text" name="username" />
						<span>带星号为必填项</span></td>
					</tr>
					<tr>
						<td width="40%" align="right">电子邮箱：</td>
						<td width="60%" align="left"><input type="email" name="email" />
						<span></span></td>
					</tr>
					<tr>
						<td align="right">*密码：</td>
						<td align="left"><input type="password" name="password" />
						<span></span></td>
					</tr>
					<tr>
						<td align="right">*确认密码：</td>
						<td align="left"><input type="password" name="password" />
						<span></span></td>
					</tr>
					<tr>
						<td></td>
						<td align="left"><input name="save" type="checkbox" value="" checked>保存密码</td>
					</tr>
					<tr>
						<td></td>
						<td align="left"><input type="submit" name="" value="免费注册"></td>
						</tr>
				</form>
			</table>
		

			<table style="display: none" id="logintable">
				<form action="./php/login.php" method="post">
					<tr>
						<td width="30%" align="right">用户名：</td>
						<td width="70%" align="left"><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td align="right">密码：</td>
						<td align="left"><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td></td>
						<td align="left"><input name="save" type="checkbox" value="" checked>保存密码</td>
					</tr>
					<tr>
						<td></td>
						<td align="left"><input type="submit" name="" value="登陆"></td>
						</tr>
				</form>
			</table>
	</div>

	<?php
	}
	else{
		echo "<script>location.href='./php/webpage.php';</script>";
	}
	?>
</body>
</html>