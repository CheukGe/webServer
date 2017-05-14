<?php
include "./connect.php";
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];
$key = $_GET['key'];
$sql = mysql_query("select * from user where username='" ."$username"."' or email='" ."$username"."'");
if($result = mysql_fetch_assoc($sql)){
	$path = $result['picture'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>搜索</title>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/search.css">
	<script src="../js/jq.js"></script>
</head>
<body>
<div id="wrap">
		<nav>
			<li><a href="./webpage.php" class="index">首页</a></li>
			<li>
            <form action="./search.php" method="get"><input name="key" type="text" size="25" placeholder="搜索站内网站"><input type="submit" value="search" ></form>
			</li>
			<li><a href="./add.php" class="add">献文</a></li>
			<dd>这只是个标题！</dd>
		</nav>
			<div id="users">
					<img src="<?php echo $path?>" width=70px height=70px id="userlogin" />
							<div id="user" style="display: none">
								<h2><?php 
								echo $username."<br>";
								echo "<a href='./deluser.php'>注销账户</a><br><a href='./userset.php'>用户设置</a>";
								?></h2>
					</div>
				</div>
			 </div>
			  <?php
			  	}
			  ?>
<div id="searchdiv">
<table>
	<?php
		$data2 = mysql_query("select * from article where title like '%".$key."%' or username like '%".$key."%' or body like '%".$key."%' or about like '%".$key."%' order by dateline desc");
		while($row = mysql_fetch_assoc($data2)){
	?>
		
			<!--<dd>这是内容：<a href="./info.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></dd>
			<dd>这是作者名：点击搜索更多同一作者文章<a href="./search.php?key=<?php echo $row['username'];?>"><?php echo $row['username'];?></a></dd>-->
			<tr>
				<td width="20%"><a href="./info.php?id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></td>
				<td>author<a href="./searchuser.php?key=<?php echo $row['username'];?>"><?php echo $row['username'];?></a></td>
				<td height="20px"><font><?php echo $row['body'];?></font></td>
			</tr>
	<?php
	}
if(0==@mysql_num_rows($data2)){	
	echo "<td>没有找到该资源</td>";
}
?>
</table>
</div>


</body>
</html>
<script src="../js/webpage.js"></script>