
<?php
//连接数据库
$con = mysql_connect('localhost', 'root', '') or 
    die ("connect failed" . mysql_error());
mysql_select_db("nba") or die(mysql_error());
mysql_query("set names 'utf8'");
$result = mysql_query("select * from account_info where account='yll' ",$con);?>
     <table border=1>
	<tr>
		<th>大前锋</th>
		<th>小前锋</th>
		<th>中锋</th>
		<th>得分后卫</th>
		<th>控球后卫</th>
	</tr>
	<?php $arr=mysql_fetch_array($result); ?>
	<tr>
		<td><?php echo $arr['PF'];?>&nbsp;</td>
		<td><?php echo $arr['SF'];?>&nbsp;</td>
		<td><?php echo $arr['Center'];?>&nbsp;</td>
		<td><?php echo $arr['SG'];?>&nbsp;</td>
		<td><?php echo $arr['PG'];?>&nbsp;</td>
	</tr>
	
    </table>
	<p>
	恭喜您!<br>
	您阵容的名次为： <br>
	<p>
	<?php
mysql_close($con);
?>
  