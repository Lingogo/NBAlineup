<?php
//连接数据库
$con = mysql_connect('localhost', 'root', '') or 
    die ("connect failed" . mysql_error());
mysql_select_db("nba") or die(mysql_error());
mysql_query("set names 'utf8'");

if($_GET)
{
	$account=$_GET['name'];
	$password1=$_GET['password1'];
	$password2=$_GET['password2'];
}

$result = mysql_query("select * from account_info ",$con);
$flag=0;
if($password1!=$password2)
{
	echo "两次密码不一致，请重新输入！"."<br>";
	$flag=1;
}

while($arr=mysql_fetch_array($result))
{
	if($arr['account']==$account)
	{
		echo "您输入的用户名：".$account."已经存在！"."<br>";
		echo "请重新输入！";
		$flag=1;
	}
}
if(!$flag)
{
	mysql_query("insert into account_info values('$account','$password1','','','','','','','')",$con);
	include "login.html";
}
else
	include "register.html";
mysql_close($con);

?>