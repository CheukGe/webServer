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
			<div class="suffer" id="sufferflash">
						<p>你共得到了<?php echo $result['suffer']?>经验</p>
						<span style="width: <?php echo $result['suffer']?>px"></span>
			</div>
	
</div>
<div id="mainbody">
		<?php
			if(!isset($_GET['p'])){
				$page=1;
				echo "<script>$('#sufferflash').show(1000);</script>";
			}

			else{
				$page = $_GET['p'];
				echo "<script>$('#sufferflash').hide();</script>";
			}
			$showpage = 10;
			$data = mysql_query("SELECT * FROM article LIMIT " .(($page-1)*$showpage). ",".$showpage."");
			while($buffer = mysql_fetch_assoc($data)){
		?>
				<aside>
					<a href="./info.php?id=<?php echo $buffer['id'];?>" class="title"><?php echo $buffer['title'];?></a>
					<a href="./search.php?key=<?php echo $buffer['username']?>" class="author"><?php echo $buffer['username']?></a>
					<p><a href="./info.php?id=<?php echo $buffer['id'];?>" class="body"><?php echo $buffer['about'];?></a></p>

				</aside>
				<?php }?>
		<?php
			$lastpage = $page-1;
			$nextpage = $page+1;
			$array = mysql_fetch_array(mysql_query("select count(*) from article"));
			$total_data = $array[0];
			$total_pages = ceil($total_data/10);
			$pageoffset = 2;
			$page_banner = "";
			$start = 1;
			$end = $total_pages;
			echo '<div class="page">';
			if($page > 1){
			$page_banner .="<a href='" .$_SERVER['PHP_SELF']. "?p=1'>首页</a>";
			$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=" .($page-1)."'>上一页</a>";
			}
			if($total_pages>$showpage){
			/*if($page>$pageoffset+1){
			$page_banner .="...";
			}*/
			if($total_pages>$pageoffset){
			$start = $total_pages-$pageoffset;
			$end = $total_pages>$total_pages+$pageoffset?$total_pages+$pageoffset:$total_pages;
			}
			else{
			$start = 1;
			$end = $total_pages>$showpage?$showpage:$total_pages;
			}
			if($total_pages+$pageoffset>$total_pages){
			$start = $start - ($total_pages+$pageoffset-$end);
			$end = $total_pages;
			}
			}
								/*for($i=$start;$i<=$end;$i++){
								if($total_pages == $i){
								$page_banner .= "<font href='" .$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</font>";
								}else{
								$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
								}
								}*/
			//for($i=$start;$i<$end;$i++){}
			if($page<$total_pages){
			if($total_pages>$showpage&&$total_pages>$total_pages+$pageoffset){
			$page_banner .="...";
			}

			$page_banner .="第".$page."页"."/"."共".$total_pages."页";
			$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
			$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=".$total_pages."'>尾页</a>";
			echo $page_banner;
			}
			if($page==$total_pages){
				$page_banner .="第".$page."页"."/"."共".$total_pages."页";
				$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";
				$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=".($page-($total_pages-1))."'>首页</a>";
				echo $page_banner;
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