<?php
//连接数据库
session_start();
$con = mysql_connect('localhost', 'root', '') or 
    die ("connect failed" . mysql_error());
mysql_select_db("nba") or die(mysql_error());
mysql_query("set names 'utf8'");

$account = $_SESSION["name"];
?>
&nbsp &nbsp &nbsp &nbsp 阵容排行榜


<table border=1>
<tr>
		<th>名次</th>
		<th>用户名</th>
		<th>与之对抗</th>
	</tr>
<?php 
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==1)
			{
?>
<form action="PK.php" method="get">

	<tr>
		<td>
		<?php
				echo $arr['rank'];
				?>&nbsp;</td>
				<td><?php echo $arr['account'];?>&nbsp;</td>
				<input type="hidden" name="targetaccount" value= <?php echo $arr['account'];?> />
				<td>
				<input type="submit" name="submit" value="阵容对抗" />
		</td>
	</tr>
</form>
<?php
			}
		}	
?>

<?php 
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==2)
			{
?>
<form action="PK.php" method="get">

	<tr>
		<td>
		<?php
				echo $arr['rank'];
				?>&nbsp;</td>
				<td><?php echo $arr['account'];?>&nbsp;</td>
				<input type="hidden" name="targetaccount" value= <?php echo $arr['account'];?> />
				<td>
				<input type="submit" name="submit" value="阵容对抗" />
		</td>
	</tr>
</form>
<?php
			}
		}	
?>

<?php 
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==3)
			{
?>
<form action="PK.php" method="get">

	<tr>
		<td>
		<?php
				echo $arr['rank'];
				?>&nbsp;</td>
				<td><?php echo $arr['account'];?>&nbsp;</td>
				<input type="hidden" name="targetaccount" value= <?php echo $arr['account'];?> />
				<td>
				<input type="submit" name="submit" value="阵容对抗" />
		</td>
	</tr>
</form>
<?php
			}
		}	
?>

<?php 
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==4)
			{
?>
<form action="PK.php" method="get">

	<tr>
		<td>
		<?php
				echo $arr['rank'];
				?>&nbsp;</td>
				<td><?php echo $arr['account'];?>&nbsp;</td>
				<input type="hidden" name="targetaccount" value= <?php echo $arr['account'];?> />
				<td>
				<input type="submit" name="submit" value="阵容对抗" />
		</td>
	</tr>
</form>
<?php
			}
		}	
?>

<?php 
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==5)
			{
?>
<form action="PK.php" method="get">

	<tr>
		<td>
		<?php
				echo $arr['rank'];
				?>&nbsp;</td>
				<td><?php echo $arr['account'];?>&nbsp;</td>
				<input type="hidden" name="targetaccount" value= <?php echo $arr['account'];?> />
				<td>
				<input type="submit" name="submit" value="阵容对抗" />
		</td>
	</tr>
</form>
<?php
			}
		}	
?>