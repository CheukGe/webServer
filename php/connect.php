<?php
header("content-type:text/html;charset=utf8");
$con = mysql_connect("127.0.0.1","root","root");
if($con){
	$db = mysql_select_db("webServer");
	if($db){
		mysql_query("set names utf8");
	}
}

?>