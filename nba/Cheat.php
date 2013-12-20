<?php
//连接数据库
$con = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or 
    die ("connect failed" . mysql_error());
mysql_select_db("app_nbaline") or die(mysql_error());
mysql_query("set names 'utf-8'");
?>

<body background=image/player.jpg>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
	</HEAD>
 <form action="player_choose.html" method="get">
		<input type="submit" name="fanhui" value="返回球队页面" />
	</form>
<center>
<strong><font size = 4 color=white>
<?php
if($_GET)
{
	$pteam=$_GET['submit'];
    echo $pteam ;
}
$result = mysql_query("select * from player_info where pteam='$pteam' ",$con);?> </font></strong>
<table border="1px" cellspacing="0px" style="border-collapse:collapse"  bgcolor=#FFEFB6 bordercolor=#FF8000>
<tr bgcolor=#FFD200 align="center">
		<th>姓名</th>
		<th>篮板</th>
		<th>助攻</th>
		<th>抢断</th>
		<th>盖帽</th>
		<th>失误</th>
		<th>犯规</th>
		<th>得分</th>
		<th>选择</th>
		<th>提交</th>
	</tr>
<?php
while($arr=mysql_fetch_array($result)){
?>

<form action="submit.php" method="get">

	<tr>
		<td><?php echo $arr['pname'];?>&nbsp;</td>
		<td><?php echo $arr['pboard'];?>&nbsp;</td>
		<td><?php echo $arr['passist'];?>&nbsp;</td>
		<td><?php echo $arr['psteal'];?>&nbsp;</td>
		<td><?php echo $arr['pblock'];?>&nbsp;</td>
		<td><?php echo $arr['pmistake'];?>&nbsp;</td>
		<td><?php echo $arr['pfoul'];?>&nbsp;</td>
		<td><?php echo $arr['pgoal'];?>&nbsp;</td>	
		<td> 
		
		<select name="choose">
          <option >选择阵容...</option>
          <option value='1'>大前锋</option>
          <option value='2'>小前锋</option>
          <option value='3'>中锋</option>
          <option value='4'>得分后卫</option>
          <option value='5'>控球后卫</option>
			</select>
		</td>
		<input type="hidden" name="pname" value= <?php echo $arr['pname'];?> />
		<td>
		<input type="submit" name="submit" value="提交" />
		 
	</form>
		</td>	
<?php
}
mysql_close($con);
?>




