<?php
//连接数据库
session_start();
$con = mysql_connect('localhost', 'root', '') or 
    die ("connect failed" . mysql_error());
mysql_select_db("nba") or die(mysql_error());
mysql_query("set names 'utf8'");

$account1 = $_SESSION["name"];
if($_GET)
{
	$targetaccount=$_GET['targetaccount'];
}
$result1 = mysql_query("select * from account_info where account='$account1'",$con);
$arr1=mysql_fetch_array($result1);
$result2 = mysql_query("select * from account_info where account='$targetaccount'",$con);
$arr2=mysql_fetch_array($result2);

$pf1=$arr1['PF'];
$pfresult1 = mysql_query("select * from recent_info where pname='$pf1'",$con);
$pfinfo1=mysql_fetch_array($pfresult1);
$pf2=$arr2['PF'];
$pfresult2 = mysql_query("select * from recent_info where pname='$pf2'",$con);
$pfinfo2=mysql_fetch_array($pfresult2);

$sf1=$arr1['SF'];
$sfresult1 = mysql_query("select * from recent_info where pname='$sf1'",$con);
$sfinfo1=mysql_fetch_array($sfresult1);
$sf2=$arr2['SF'];
$sfresult2 = mysql_query("select * from recent_info where pname='$sf2'",$con);
$sfinfo2=mysql_fetch_array($sfresult2);

$c1=$arr1['Center'];
$cresult1 = mysql_query("select * from recent_info where pname='$c1'",$con);
$cinfo1=mysql_fetch_array($cresult1);
$c2=$arr2['Center'];
$cresult2 = mysql_query("select * from recent_info where pname='$c2'",$con);
$cinfo2=mysql_fetch_array($cresult2);

$sg1=$arr1['SG'];
$sgresult1 = mysql_query("select * from recent_info where pname='$sg1'",$con);
$sginfo1=mysql_fetch_array($sgresult1);
$sg2=$arr2['SG'];
$sgresult2 = mysql_query("select * from recent_info where pname='$sg2'",$con);
$sginfo2=mysql_fetch_array($sgresult2);

$pg1=$arr1['PG'];
$pgresult1 = mysql_query("select * from recent_info where pname='$pg1'",$con);
$pginfo1=mysql_fetch_array($pgresult1);
$pg2=$arr2['PG'];
$pgresult2 = mysql_query("select * from recent_info where pname='$pg2'",$con);
$pginfo2=mysql_fetch_array($pgresult2);
?>

<table border=1>
<tr>
		<th>用户名</th>
		<th>大前锋</th>
		<th>得分</th>
		<th>篮板</th>
		<th>比较结果</th>
</tr>
<tr>
		<td><?php echo $account1;?>&nbsp;</td>
		<td><?php echo $arr1['PF'];?>&nbsp;</td>
		<td><?php echo $pfinfo1['pgoal'];?>&nbsp;</td>
		<td><?php echo $pfinfo1['pboard'];?>&nbsp;</td>
		<td><?php
				if(($pfinfo1['pgoal']/2+$pfinfo1['pboard'])>($pfinfo2['pgoal']/2+$pfinfo2['pboard']))
					echo "胜";
				else if(($pfinfo1['pgoal']/2+$pfinfo1['pboard'])<($pfinfo2['pgoal']/2+$pfinfo2['pboard']))
					echo "负";
				else 
					echo "平";
				?>&nbsp;</td>

</tr>

<tr>
		<td><?php echo $targetaccount;?>&nbsp;</td>
		<td><?php echo $arr2['PF'];?>&nbsp;</td>
		<td><?php echo $pfinfo2['pgoal'];?>&nbsp;</td>
		<td><?php echo $pfinfo2['pboard'];?>&nbsp;</td>
		<td><?php
				if(($pfinfo1['pgoal']/2+$pfinfo1['pboard'])<($pfinfo2['pgoal']/2+$pfinfo2['pboard']))
					echo "胜";
				else if(($pfinfo1['pgoal']/2+$pfinfo1['pboard'])>($pfinfo2['pgoal']/2+$pfinfo2['pboard']))
					echo "负";
				else 
					echo "平";
				?>&nbsp;</td>
</tr>
</table>
<p>
<table border=1>
<tr>
		<th>用户名</th>
		<th>小前锋</th>
		<th>得分</th>
		<th>比较结果</th>
</tr>
<tr>
		<td><?php echo $account1;?>&nbsp;</td>
		<td><?php echo $arr1['SF'];?>&nbsp;</td>
		<td><?php echo $sfinfo1['pgoal'];?>&nbsp;</td>
		<td><?php
				if(($sfinfo1['pgoal'])>($sfinfo2['pgoal']))
					echo "胜";
				else if(($sfinfo1['pgoal'])<($sfinfo2['pgoal']))
					echo "负";
				else
					echo "平";
				?>&nbsp;</td>

</tr>
<tr>
		<td><?php echo $targetaccount;?>&nbsp;</td>
		<td><?php echo $arr2['SF'];?>&nbsp;</td>
		<td><?php echo $sfinfo2['pgoal'];?>&nbsp;</td>
		<td><?php
				if(($sfinfo1['pgoal'])<($sfinfo2['pgoal']))
					echo "胜";
				else if(($sfinfo1['pgoal'])>($sfinfo2['pgoal']))
					echo "负";
				else
					echo "平";
				?>&nbsp;</td>
</tr>
</table>
<p>
<table border=1>
<tr>
		<th>用户名</th>
		<th>中锋</th>
		<th>得分</th>
		<th>篮板</th>
		<th>比较结果</th>
</tr>
<tr>
		<td><?php echo $account1;?>&nbsp;</td>
		<td><?php echo $arr1['Center'];?>&nbsp;</td>
		<td><?php echo $cinfo1['pgoal'];?>&nbsp;</td>
		<td><?php echo $cinfo1['pboard'];?>&nbsp;</td>
		<td><?php
				if(($cinfo1['pgoal']/2+$cinfo1['pboard'])>($cinfo2['pgoal']/2+$cinfo2['pboard']))
					echo "胜";
				else if(($cinfo1['pgoal']/2+$cinfo1['pboard'])<($cinfo2['pgoal']/2+$cinfo2['pboard']))
					echo "负";
				else 
					echo "平";
				?>&nbsp;</td>

</tr>

<tr>
		<td><?php echo $targetaccount;?>&nbsp;</td>
		<td><?php echo $arr2['Center'];?>&nbsp;</td>
		<td><?php echo $cinfo2['pgoal'];?>&nbsp;</td>
		<td><?php echo $cinfo2['pboard'];?>&nbsp;</td>
		<td><?php
				if(($cinfo1['pgoal']/2+$cinfo1['pboard'])<($cinfo2['pgoal']/2+$cinfo2['pboard']))
					echo "胜";
				else if(($cinfo1['pgoal']/2+$cinfo1['pboard'])>($cinfo2['pgoal']/2+$cinfo2['pboard']))
					echo "负";
				else 
					echo "平";
				?>&nbsp;</td>
</tr>
</table>
<p>
<table border=1>
<tr>
		<th>用户名</th>
		<th>得分后卫</th>
		<th>得分</th>
		<th>比较结果</th>
</tr>
<tr>
		<td><?php echo $account1;?>&nbsp;</td>
		<td><?php echo $arr1['SG'];?>&nbsp;</td>
		<td><?php echo $sginfo1['pgoal'];?>&nbsp;</td>
		<td><?php
				if(($sginfo1['pgoal'])>($sginfo2['pgoal']))
					echo "胜";
				else if(($sginfo1['pgoal'])<($sginfo2['pgoal']))
					echo "负";
				else
					echo "平";
				?>&nbsp;</td>

</tr>
<tr>
		<td><?php echo $targetaccount;?>&nbsp;</td>
		<td><?php echo $arr2['SG'];?>&nbsp;</td>
		<td><?php echo $sginfo2['pgoal'];?>&nbsp;</td>
		<td><?php
				if(($sginfo1['pgoal'])<($sginfo2['pgoal']))
					echo "胜";
				else if(($sginfo1['pgoal'])>($sginfo2['pgoal']))
					echo "负";
				else
					echo "平";
				?>&nbsp;</td>
</tr>
</table>
<p>
<table border=1>
<tr>
		<th>用户名</th>
		<th>控球后卫</th>
		<th>助攻</th>
		<th>失误</th>
		<th>比较结果</th>
</tr>
<tr>
		<td><?php echo $account1;?>&nbsp;</td>
		<td><?php echo $arr1['PG'];?>&nbsp;</td>
		<td><?php echo $pginfo1['passist'];?>&nbsp;</td>
		<td><?php echo $pginfo1['pmistake'];?>&nbsp;</td>
		<td><?php
				if(($pginfo1['passist']-$pginfo1['pmistake'])>($pginfo2['passist']-$pginfo2['pmistake']))
					echo "胜";
				else if(($pginfo1['passist']-$pginfo1['pmistake'])<($pginfo2['passist']-$pginfo2['pmistake']))
					echo "负";
				else 
					echo "平";
				?>&nbsp;</td>

</tr>

<tr>
		<td><?php echo $targetaccount;?>&nbsp;</td>
		<td><?php echo $arr2['PG'];?>&nbsp;</td>
		<td><?php echo $pginfo2['passist'];?>&nbsp;</td>
		<td><?php echo $pginfo2['pmistake'];?>&nbsp;</td>
		<td><?php
				if(($pginfo1['passist']-$pginfo1['pmistake'])<($pginfo2['passist']-$pginfo2['pmistake']))
					echo "胜";
				else if(($pginfo1['passist']-$pginfo1['pmistake'])>($pginfo2['passist']-$pginfo2['pmistake']))
					echo "负";
				else 
					echo "平";
				?>&nbsp;</td>
</tr>
</table>
<p>
<?php echo "综合比较，";
	if($arr1['rank']>$arr2['rank'])
		echo $arr2['account']."的阵容胜！";
	else
		echo $arr1['account']."的阵容胜！";
		?>