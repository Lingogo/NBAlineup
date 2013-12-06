<?php
//连接数据库
session_start();
$con = mysql_connect('localhost', 'root', '') or 
    die ("connect failed" . mysql_error());
mysql_select_db("nba") or die(mysql_error());
mysql_query("set names 'utf8'");

$account = $_SESSION["name"];
$result = mysql_query("select * from account_info ",$con);
?>

<table border=1>
<tr>
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
		<input type="hidden" name="targetaccount" value= <?php echo $arr['account'];?> />
		<td>
		<input type="submit" name="submit" value="阵容对抗" />
		</td>
	</form>
		
<?php	
}
mysql_close($con);	
?>