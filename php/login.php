<?php
require("connect.php");
	$username = $_POST['username'];
	$password = $_POST['password'];
	@$save = $_POST['save'];

	$sql = mysql_query("select * from user where username='" ."$username"."' or email='" ."$username"."'");
	$result = mysql_fetch_assoc($sql);
	if($result!=null){
		if($result){
					$path = $result['picture'];
					if(($username==$result['username']||$username=$result['email'])&&($password==$result['password'])){
							setcookie("username",'',time()-1,"../");
							setcookie("password",'',time()-1,"../");
						if(isset($save)){
							setcookie("username",$username,time()+60*60*24*7,"/");
							setcookie("password",$password,time()+60*60*24*7,"/");
							$dateline = time();
							mysql_query("update user set count=count+1,suffer=suffer+10,lastlogin=$dateline where username='" ."$username"."' or email='" ."$username"."'");
							echo "<script>location.href='./webpage.php'</script>";
						}else{
							session_start();

						}
					}
					else{
					echo "<script>alert('密码输入错误');location.href='../index.php'</script>";
				}
					}
			}
			elseif($result==null){
			echo "<script>alert('没有该帐号');location.href='../index.php'</script>";
		}
		else{
			echo "<script>alert('账号错误');location.href='../index.php'</script>";
		}
		
?>

