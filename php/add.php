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
  <title>献文</title>
  <link rel="stylesheet" type="text/css" href="../css/webpage.css">
  <script src="../js/jq.js"></script>
  <script src="../js/webpage.js"></script>
  <style type="text/css">
  .add{
  height: 68px;
  padding: 10px 30px;
  line-height: 70px;
  margin-right: 0px;
}
table{
  margin-top: -100px;
}
body{
  background: url("../picture/image_00.jpg");
  color: white;
}
 table input{
  opacity: 0.8;
  height: 20px;
  font-size: 20px;
  color: #5f5f9f;
}
textarea{
  opacity: 0.8;
  color: #5c3317;
}
</style>
</head>
<body>
  <div id="wrap">
    <nav>
      <li><a href="webpage.php">首页</a></li>
      <li>
            <form action="./search.php" method="get"><input name="searchtext" type="text" size="25" placeholder="搜索站内网站"><input name="search" type="submit" value="search" ></form>
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
           <?php }mysql_close($con);
            ?>
        </div>
        </div>
        <form action="./addbuffer.php" method="post">
            <table width="800px" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" align="right">标题：</td>
                <td height="30"><label for="title"></label>
                <input type="text" name="title" id="title" /></td>
              </tr>
               <tr>
                <td align="right">简介：</td>
                <td height="30">
                <textarea name="description" id="description" cols="30" rows="2"></textarea>
                </td>
              </tr>
              <tr>
                <td align="right" valign="top">主体：</td>
                <td><label for="body"></label>
                <textarea name="body" id="body" cols="80" rows="20"></textarea></td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td><input type="submit" name="tj" id="tj" value="提交" style="font-size: 12px" /></td>
              </tr>
            </table>
        </form>
  </div>
</body>
</html>
