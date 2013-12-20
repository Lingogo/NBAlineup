<?php
session_start();

$con = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or 
    die ("connect failed" . mysql_error());
mysql_select_db("app_nbaline") or die(mysql_error());
mysql_query("set names 'utf-8'");
$account = $_SESSION["name"];
$result = mysql_query("select * from account_info where account='$account' ",$con);
$arr=mysql_fetch_array($result);?>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
	</HEAD>
<form action="index.html" method="get">
		<input type="submit" name="submit" value="返回首页" />
	</form>

<head>
	<title> 我的阵容 </title>
	<link rel="stylesheet" type="text/css" href="qs.css" />
</head>

<center>
<p>
	恭喜您!<br>
	您阵容的名次为：<font size = 6  color = "FF0000"> <?php echo   $arr['rank'] ;?> </font> <br>
<p>
</center>
<body background = image/qiuchang.jpg>
	<div class="pf">大前锋<br><?php echo $arr['PF'];?></div>
	<div class="sf">小前锋<br><?php echo $arr['SF'];?></div>
	<div class="c">中锋<br><?php echo $arr['Center'];?></div>
	<div class="sg">得分后卫<br><?php echo $arr['SG'];?></div>
	<div class="pg">控球后卫<br><?php echo $arr['PG'];?></div>
</body>
	<?php
mysql_close($con);
?>
  