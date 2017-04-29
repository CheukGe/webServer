<?php
header("content-type:text/html;charset=utf8");
setcookie("username","",time(),"/");
setcookie("password","",time(),"/");
echo "<script>alert('返回登录');location.href='../index.php'</script>";
?>