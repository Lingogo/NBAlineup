<?php
//连接数据库
$con = mysql_connect('localhost', 'root', '') or 
    die ("connect failed" . mysql_error());
mysql_select_db("nba") or die(mysql_error());
mysql_query("set names 'utf8'");
if($_GET)
{
	$pteam=$_GET['submit'];
	echo $pteam;
}
$result = mysql_query("select * from player_info where pteam='$pteam' ",$con);?>
<table border=1>
<tr>
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




