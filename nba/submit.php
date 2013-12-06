<?php
//连接数据库
session_start();
$con = mysql_connect('localhost', 'root', '') or 
    die ("connect failed" . mysql_error());
mysql_select_db("nba") or die(mysql_error());
mysql_query("set names 'utf8'");

if($_GET)
{
	$choo=$_GET['choose'];
	$pname=$_GET['pname'];
}

$account = $_SESSION["name"];
$_SESSION["choo"]=$choo;
$_SESSION["pname"]=$pname;
$result = mysql_query("select * from account_info where account='$account' ",$con);
$arr=mysql_fetch_array($result);
if($choo == "1")
{
	if($arr['PF'])
	{
		if($arr['SF']==$pname || $arr['Center']==$pname || $arr['SG']==$pname || $arr['PG']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，并且大前锋位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>var p=window.confirm('大前锋位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
	}
	else
	{
		if($arr['SF']==$pname || $arr['Center']==$pname || $arr['SG']==$pname || $arr['PG']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>window.location.href='revise.php?id=ok';</script>";
	}
}
else if($choo == "2")
{
	if($arr['SF'])
	{
		if($arr['PF']==$pname || $arr['Center']==$pname || $arr['SG']==$pname || $arr['PG']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，并且小前锋位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>var p=window.confirm('小前锋位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
	}
	else
	{
		if($arr['PF']==$pname || $arr['Center']==$pname || $arr['SG']==$pname || $arr['PG']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>window.location.href='revise.php?id=ok';</script>";
	}
}
else if($choo == "3")
{
	if($arr['Center'])
	{
		if($arr['SF']==$pname || $arr['PF']==$pname || $arr['SG']==$pname || $arr['PG']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，并且中锋位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>var p=window.confirm('中锋位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
	}
	else
	{
		if($arr['SF']==$pname || $arr['PF']==$pname || $arr['SG']==$pname || $arr['PG']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>window.location.href='revise.php?id=ok';</script>";
	}
}
else if($choo == "4")
{
	if($arr['SG'])
	{
		if($arr['SF']==$pname || $arr['Center']==$pname || $arr['PF']==$pname || $arr['PG']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，并且得分后卫位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>var p=window.confirm('得分后卫位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
	}
	else
	{
		if($arr['SF']==$pname || $arr['Center']==$pname || $arr['PF']==$pname || $arr['PG']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>window.location.href='revise.php?id=ok';</script>";
	}
}
else if($choo == "5")
{
	if($arr['PG'])
	{
		if($arr['SF']==$pname || $arr['Center']==$pname || $arr['SG']==$pname || $arr['PF']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，并且控球后卫位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>var p=window.confirm('控球后卫位置已经有人，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
	}
	else
	{
		if($arr['SF']==$pname || $arr['Center']==$pname || $arr['SG']==$pname || $arr['PF']==$pname)
			echo "<script>var p=window.confirm('该球员已在其他位置出现，您确定要修改吗？');if(p){window.location.href='revise.php?id=ok';}else{window.location.href='revise.php?id=no';};</script>";
		else
			echo "<script>window.location.href='revise.php?id=ok';</script>";
	}
}


mysql_close($con);
?>