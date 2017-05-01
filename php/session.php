<?php
	include("login.php");
	function saveuser(){
	if(isset($save)){
	setcookie("username",$username,time()+60*60*24*7,"/");
	setcookie("password",$password,time()+60*60*24*7,"/");
	$dateline = time();
	mysql_query("update user set count=count+1,suffer=suffer+10,lastlogin=$dateline where username='" ."$username"."' or email='" ."$username"."'");
	echo "<script>location.href='./webpage.php'</script>";
	}else{
		session_start();
		session['username'] = $username;
		session[]
	}
}