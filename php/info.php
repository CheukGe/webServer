<?php
require('./connect.php');
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];
$id = $_GET['id'];
$sql = mysql_query("select * from user where username='" ."$username"."' or email='" ."$username"."'");
if($result = mysql_fetch_assoc($sql)){
	$path = $result['picture'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/webpage.css">
	<link rel="stylesheet" type="text/css" href="../css/info.css">
	<script src="../js/jq.js"></script>
	<style>
		@keyframes suffer{
	from{
		width:0px;

	}
	to{
		width:<?php echo $result['suffer']?>px;
		}
	}
span{
	height: 10px;
	background: red;
	position: absolute;
	top: 0px;
	left: 0px;
	animation:suffer 1s;
}
	</style>
</head>
<body>
<div id="wrap">
		<nav>
			<li><a href="./webpage.php" class="index">首页</a></li>
			<li>
            <form action="./search.php" method="get"><input name="key" type="text" size="25" placeholder="搜索站内网站"><input type="submit" value="search" ></form>
			</li>
			<li><a href="./add.php" class="add">献文</a></li>
			<dd>为世界展示你的学识！</dd>
		</nav>
			<div id="users">
					<img src="<?php echo $path?>" width=70px height=70px id="userlogin" />
							<div id="user" style="display: none">
								<h2><?php 
								echo $username."<br>";
								echo "<a href='./deluser.php'>注销账户</a><br><a href='./userset.php'>用户设置</a>";
								?></h2>
								<p>你共登录了<?php echo $result['count']?>次</p>
								<p>你登录时间是<br><?php echo date("Y-m-d H:i:s",$result['lastlogin'])?></p>
								<div class="sufferbar">
									<p>你共得到了<?php echo $result['suffer']?>经验</p>
									<span style="width: <?php echo $result['suffer']?>px"></span>
					</div>
				</div>
			  </div>
			  </div>
			  <div id="article">
					<?php
						$data = mysql_query("select * from article where id = $id");
						if($row = mysql_fetch_assoc($data)){
							$str = $row['body'];
							$str = str_replace("\n","<br>",$str);
							echo $str;
						}
					?>
			  </div>
</body>
</html>
<script src="../js/webpage.js"></script>
<?php
}
mysql_close($con);
?>