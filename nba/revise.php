<?php
//连接数据库
session_start();
$con = mysql_connect('localhost', 'root', '') or 
    die ("connect failed" . mysql_error());
mysql_select_db("nba") or die(mysql_error());
mysql_query("set names 'utf8'");

$getid = $_REQUEST["id"];
$account = $_SESSION["name"];
$choo = $_SESSION["choo"];
$pname = $_SESSION["pname"];

$result = mysql_query("select * from account_info where account='$account' ",$con);
$arr=mysql_fetch_array($result);
if($getid == "ok")
{
	echo "您已成功设置   ".$pname."   为";
	if($choo == "1")
	{
		echo "大前锋";
		if($arr['SF']==$pname)
			mysql_query("update account_info set SF='' where account='$account' ",$con);
		else if($arr['Center']==$pname)
			mysql_query("update account_info set Center='' where account='$account' ",$con);
		else if($arr['SG']==$pname)
			mysql_query("update account_info set SG='' where account='$account' ",$con);
		else if($arr['PG']==$pname)
			mysql_query("update account_info set PG='' where account='$account' ",$con);
		mysql_query("update account_info set PF='$pname' where account='$account' ",$con);
	}
	if($choo == "2")
	{
		echo "小前锋";
		if($arr['PF']==$pname)
			mysql_query("update account_info set PF='' where account='$account' ",$con);
		if($arr['Center']==$pname)
			mysql_query("update account_info set Center='' where account='$account' ",$con);
		if($arr['SG']==$pname)
			mysql_query("update account_info set SG='' where account='$account' ",$con);
		if($arr['PG']==$pname)
			mysql_query("update account_info set PG='' where account='$account' ",$con);
		mysql_query("update account_info set SF='$pname' where account='$account' ",$con);
	}
	if($choo == "3")
	{
		echo "中锋";
		if($arr['SF']==$pname)
			mysql_query("update account_info set SF='' where account='$account' ",$con);
		if($arr['PF']==$pname)
			mysql_query("update account_info set PF='' where account='$account' ",$con);
		if($arr['SG']==$pname)
			mysql_query("update account_info set SG='' where account='$account' ",$con);
		if($arr['PG']==$pname)
			mysql_query("update account_info set PG='' where account='$account' ",$con);
		mysql_query("update account_info set Center='$pname' where account='$account' ",$con);
	}
	if($choo == "4")
	{
		echo "得分后卫";
		if($arr['PF']==$pname)
			mysql_query("update account_info set PF='' where account='$account' ",$con);
		if($arr['Center']==$pname)
			mysql_query("update account_info set Center='' where account='$account' ",$con);
		if($arr['PF']==$pname)
			mysql_query("update account_info set PF='' where account='$account' ",$con);
		if($arr['PG']==$pname)
			mysql_query("update account_info set PG='' where account='$account' ",$con);
		mysql_query("update account_info set SG='$pname' where account='$account' ",$con);
	}
	if($choo == "5")
	{
		echo "控球后卫";
		if($arr['PF']==$pname)
			mysql_query("update account_info set PF='' where account='$account' ",$con);
		if($arr['Center']==$pname)
			mysql_query("update account_info set Center='' where account='$account' ",$con);
		if($arr['SG']==$pname)
			mysql_query("update account_info set SG='' where account='$account' ",$con);
		if($arr['PF']==$pname)
			mysql_query("update account_info set PF='' where account='$account' ",$con);
		mysql_query("update account_info set PG='$pname' where account='$account' ",$con);
	}


	$result = mysql_query("select * from account_info where account='$account' ",$con);
	$arr=mysql_fetch_array($result);

	$name=$arr['PF'];
	$result1 = mysql_query("select * from recent_info where pname='$name' ",$con);
	if($arr1=mysql_fetch_array($result1))
	{
		$goal=$arr1['pgoal'];
		$board=$arr1['pboard'];
		$s1=($goal/4+$board)/2;
	}
	else
		$s1=0;
	
	$name=$arr['SF'];
	$result2 = mysql_query("select * from recent_info where pname='$name' ",$con);
	if($arr2=mysql_fetch_array($result2))
	{
		$goal=$arr2['pgoal'];
		$s2=$goal/4;
	}
	else
		$s2=0;
	$name=$arr['Center'];
	$result3 = mysql_query("select * from recent_info where pname='$name' ",$con);
	if($arr3=mysql_fetch_array($result3))
	{
		$block=$arr3['pblock'];
		$board=$arr3['pboard'];
		$s3=$block+$board;
	}
	else
		$s3=0;
	$name=$arr['SG'];
	$result4 = mysql_query("select * from recent_info where pname='$name' ",$con);
	if($arr4=mysql_fetch_array($result4))
	{
		$goal=$arr4['pgoal'];
		$s4=$goal/4;
	}
	else
		$s4=0;
	$name=$arr['PG'];
	$result5 = mysql_query("select * from recent_info where pname='$name' ",$con);
	if($arr5=mysql_fetch_array($result5))
	{
		$assist=$arr5['passist'];
		$mistake=$arr5['pmistake'];
		$s5=$assist-$mistake;
	}
	else
		$s5=0;
	$s=$s1+$s2+$s3+$s4+$s5;
	mysql_query("update account_info set score='$s' where account='$account' ",$con);

	$result1 = mysql_query("select * from account_info ",$con);

	while($i=mysql_fetch_array($result1))
	{
		$rank=1;
		$account=$i['account'];
		$result2 = mysql_query("select * from account_info ",$con);
		while($j=mysql_fetch_array($result2))
		{
			if($i['score'] < $j['score'])
			{
				$rank=$rank+1;
			}	
		}
		mysql_query("update account_info set rank = '$rank' where account='$account' ",$con);
	}
	include "player_choose.html";
}
else if($getid == "no")
{
	echo "NO";
	include "player_choose.html";
}
	

?>