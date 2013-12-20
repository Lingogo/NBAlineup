<?php
session_start();
$con = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or 
    die ("connect failed" . mysql_error());
mysql_select_db("app_nbaline") or die(mysql_error());
mysql_query("set names 'utf-8'");?>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
	</HEAD>
<?php

if($_GET)
{
	$name=$_GET['name'];
	$password=$_GET['password'];
}

$result = mysql_query("select * from account_info ",$con);
$flag=0;
while($arr=mysql_fetch_array($result))
{
	if($arr['account']==$name && $arr['password']==$password)
	{
		$flag=1;
	}
}
if($flag)
{
	$_SESSION["name"]=$name;
	include "index.html";
	//echo "<script>alert('登陆成功！'); window.location.href = "NBAline.html";</script> "; <?php
}
else
{
	echo "登陆错误，请重新登陆！"."<br>";
	include "login.html"; 
}

?>