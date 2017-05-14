<?php
require('./connect.php');
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];
$sql = mysql_query("select * from user where username='" ."$username"."' or email='" ."$username"."'");
if($result = mysql_fetch_assoc($sql)){
	$path = $result['picture'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="../css/webpage.css">
	<link rel="stylesheet" type="text/css" href="../css/webpage_1.css">
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
		@keyframes statusno{
			from{
				opacity:1;
				z-index: 9999;
				display: block;
			}to{
				opacity: 0;
				display: none;
			}
		}
		.suffer{
			position: absolute;
			top:80px;
			left:40%;
			animation: statusno 2s 1;
			animation-fill-mode:forwards; 
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
			<dd>这只是个标题</dd>
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
			<div class="suffer" id="sufferflash">
						<p>你共得到了<?php echo $result['suffer']?>经验</p>
						<span style="width: <?php echo $result['suffer']?>px"></span>
			</div>
	
</div>
