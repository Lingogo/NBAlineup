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
$account = $_SESSION["name"];
$result = mysql_query("select * from account_info ",$con);
?>
<form action="index.html" method="get">
		<input type="submit" name="submit" value="返回首页" />
	</form>
<table border="1px" cellspacing="0px" style="border-collapse:collapse"  bgcolor=#FFEFB6 bordercolor=#FF8000>
<tr bgcolor=#FFD200 align="center">
		<th>用户名</th>
		<th>大前锋</th>
		<th>小前锋</th>
		<th>中锋</th>
		<th>得分后卫</th>
		<th>控球后卫</th>
		<th>与之对抗</th>
	</tr>
<?php
while($arr=mysql_fetch_array($result)){
?>

<form action="PK.php" method="get">

	<tr>
		<td><?php echo $arr['account'];?>&nbsp;</td>
		<td><?php echo $arr['PF'];?>&nbsp;</td>
		<td><?php echo $arr['SF'];?>&nbsp;</td>
		<td><?php echo $arr['Center'];?>&nbsp;</td>
		<td><?php echo $arr['SG'];?>&nbsp;</td>
		<td><?php echo $arr['PG'];?>&nbsp;</td>
        <input type="hidden" name="targetaccount" value="<?php echo $arr['account'];?>" />
		<td>
		<input type="submit" name="submit" value="阵容对抗" />
		</td>
</tr>
	</form>
		
<?php	
}
mysql_close($con);	
?>
