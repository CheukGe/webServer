<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<link rel="stylesheet" type="text/css" media="max-width:1000px" href="../phone_css/phone_list.css">
<link rel="stylesheet" type="text/css" href="../css/list.css">
<title>列表</title>
</head>
<?php
include_once("connect.php");
if(isset($_GET['p']))
$page = $_GET['p'];
else
$page = 1;
$pageSize = 10;
$showpage = 5;
$pageoffset = ($showpage-1)/2;
$result = mysql_query("SELECT * FROM article LIMIT ". ($page-1)*$pageSize .",{$pageSize}");

while($row=mysql_fetch_assoc($result)){
?>
<body>
<table cellspacing="0" width="100%" class="lable">
<tr>
<td class="left"><a href="view.php?id=<?php echo $row['id'];?>"><?php echo $row['title']?></a></td>
<td class="right"><?php echo date("Y-m-d H:i:s",$row['dateline']);?></td>
</tr>
</table>
<?php
}
mysql_free_result($result);
$total_result = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM article"));
$total = $total_result[0];
$total_pages = ceil($total/10);
mysql_close($con);
$page_banner = "";
$start = 1;
$end = $total_pages;
echo '<div class="page">';
if($page > 1){
$page_banner .="<a href='" .$_SERVER['PHP_SELF']. "?p=1'>首页</a>";
$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=" .($page-1)."'>上一页</a>";
}
if($total_pages>$showpage){
if($page>$pageoffset+1){
$page_banner .="...";
}
if($page>$pageoffset){
$start = $page-$pageoffset;
$end = $total_pages>$page+$pageoffset?$page+$pageoffset:$total_pages;
}
else{
$start = 1;
$end = $total_pages>$showpage?$showpage:$total_pages;
}
if($page+$pageoffset>$total_pages){
$start = $start - ($page+$pageoffset-$end);
$end = $total_pages;
}
}
for($i=$start;$i<=$end;$i++){
if($page == $i){
$page_banner .= "<span href='" .$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</span>";
}else{
$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
}
}
if($page<$total_pages){
if($total_pages>$showpage&&$total_pages>$page+$pageoffset){
$page_banner .="...";
}
$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
$page_banner .= "<a href='" .$_SERVER['PHP_SELF']."?p=".$total_pages."'>尾页</a>";
}
$page_banner .="第".$page."页"."/"."共".$total_pages."页";
echo $page_banner;
?>
</body>
</html1>