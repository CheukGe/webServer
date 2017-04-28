<?php
require("connect.php");
$title = $_POST['title'];
$author = $_COOKIE['username'];
$body = $_POST['body'];
$description = $_POST['description'];
//$dateline = date("m-d-y h:i:s A",time());
$dateline = time();

		  $write = "insert into article(title,username,about,body,dateline) values('$title','$author','$description','$body','$dateline')";
	//echo $write;
	  mysql_query($write);
	  mysql_close($con);
?>
<script>
window.location.href="./webpage.php";
</script>