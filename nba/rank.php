<?php
session_start();
$con = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or 
    die ("connect failed" . mysql_error());
mysql_select_db("app_nbaline") or die(mysql_error());
mysql_query("set names 'utf-8'");

$account = $_SESSION["name"];
?>
<body background=image/pkback.jpg>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
	</HEAD>
<form action="index.html" method="get">
		<input type="submit" name="submit" value="返回首页" />
	</form>
<center>
    <strong><font size =5 color=red>阵容排行榜</font></strong>


<table border="1px" cellspacing="0px" style="border-collapse:collapse"  bgcolor=#FFEFB6 bordercolor=#FF8000>
<tr bgcolor=#FFD200 align="center">
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
</form><br><p>
    <strong><font size =4>以上仅显示排名前五位的用户，如果想上榜，关注每日比赛，根据结果选择最佳阵容！</font></strong>
<?php
			}
		}	
?>
<center>