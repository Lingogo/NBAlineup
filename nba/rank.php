<?php
//连接数据库
$con = mysql_connect('localhost', 'root', '') or 
    die ("connect failed" . mysql_error());
mysql_select_db("nba") or die(mysql_error());
mysql_query("set names 'utf8'");
?>
&nbsp &nbsp &nbsp &nbsp 阵容排行榜
		<p>
		名次 用户名
		<ol>
		<li><img src="image/h.jpg" width=50 height=40><font color =#ff0000 ><font size = 5 ><?php
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==1)
				break;
		} 
		echo $arr['account']?> </font> </font>  </li>
		
		<li><img src="image/hhh.jpg" width=50 height=40><font color =#ff0000 ><font size = 4 ><?php
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==2)
				break;
		} 
		echo $arr['account']?> </font> </font> </li>
		
		
		<li><img src="image/hhh.jpg" width=50 height=40><font color =#ff0000 ><font size = 4 ><?php
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==3)
				break;
		} 
		echo $arr['account']?></li>
		</font></font>
		<li><?php
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==4)
				break;
		} 
		echo $arr['account']?></li>
		
		<li><?php
		$result = mysql_query("select * from account_info ",$con);
		while($arr=mysql_fetch_array($result))
		{
			if($arr['rank']==5)
				break;
		} 
		echo $arr['account']?> </li>

		</ol> 