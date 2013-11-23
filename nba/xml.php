<?php
        set_time_limit(10000);  //允许处理时间
        //连接数据库
        $con = mysql_connect('localhost', 'root', '') or 
            die ("connect failed" . mysql_error());
        mysql_select_db("nba") or die(mysql_error());
        mysql_query("set names 'utf8'");

        //处理每个XML文件,写入数据库
        foreach(glob("C:\\Users\\yll\\DataScraperWorks\\NBAplayer\\*.xml") 
                as $xmlfile)
        {
            $fp = fopen($xmlfile, "r");  //打开文件
            $xmlparser = xml_parser_create();  //创建解析XML解析器
            $xmldata = fread($fp, filesize($xmlfile));  //读取整个文件
            fclose($fp);  //关闭文件
            //将内容解析到数组
            //$values保存内容 $index保存索引
            xml_parse_into_struct($xmlparser, $xmldata, $values, $index);
            //var_dump($values);
            //var_dump($index);
            //保存元组
            $a = array(
              "mistake" => "",
              "foul" => "",
              "steal" => "",
			  "board" => "",
			  "assist" => "",
			  "block" => "",
			  "goal" => "",
			  "name" => "",
			  "team" => ""
            );

		$p = $index["FULLPATH"][0];
		$subject = $values[$p]["value"];
		if($subject == "http://www.stat-nba.com/team/ATL.html")
			$a["team"] = "亚特兰大老鹰";
		else if($subject == "http://www.stat-nba.com/team/BKN.html")
			$a["team"] = "布鲁克林篮网";
		else if($subject == "http://www.stat-nba.com/team/CHA.html")
			$a["team"] = "夏洛特山猫";
		else if($subject == "http://www.stat-nba.com/team/BOS.html")
			$a["team"] = "波士顿凯尔特人";
		else if($subject == "http://www.stat-nba.com/team/CHI.html")
			$a["team"] = "芝加哥公牛";
		else if($subject == "http://www.stat-nba.com/team/CLE.html")
			$a["team"] = "克里夫兰骑士";
		else if($subject == "http://www.stat-nba.com/team/DAL.html")
			$a["team"] = "达拉斯小牛";
		else if($subject == "http://www.stat-nba.com/team/DEN.html")
			$a["team"] = "丹佛掘金";
		else if($subject == "http://www.stat-nba.com/team/DET.html")
			$a["team"] = "底特律活塞";
		else if($subject == "http://www.stat-nba.com/team/GSW.html")
			$a["team"] = "金州勇士";
		else if($subject == "http://www.stat-nba.com/team/HOU.html")
			$a["team"] = "休斯顿火箭";
		else if($subject == "http://www.stat-nba.com/team/IND.html")
			$a["team"] = "印第安纳步行者";
		else if($subject == "http://www.stat-nba.com/team/LAC.html")
			$a["team"] = "洛杉矶快船";
		else if($subject == "http://www.stat-nba.com/team/LAL.html")
			$a["team"] = "洛杉矶湖人";
		else if($subject == "http://www.stat-nba.com/team/MEM.html")
			$a["team"] = "孟菲斯灰熊";
		else if($subject == "http://www.stat-nba.com/team/MIA.html")
			$a["team"] = "迈阿密热火";
		else if($subject == "http://www.stat-nba.com/team/MIL.html")
			$a["team"] = "密尔沃基雄鹿";
		else if($subject == "http://www.stat-nba.com/team/MIN.html")
			$a["team"] = "明尼苏达森林狼";
		else if($subject == "http://www.stat-nba.com/team/NOH.html")
			$a["team"] = "新奥尔良鹈鹕";
		else if($subject == "http://www.stat-nba.com/team/NYK.html")
			$a["team"] = "纽约尼克斯";
		else if($subject == "http://www.stat-nba.com/team/OKC.html")
			$a["team"] = "俄克拉荷马雷霆";
		else if($subject == "http://www.stat-nba.com/team/ORL.html")
			$a["team"] = "奥兰多魔术";
		else if($subject == "http://www.stat-nba.com/team/PHI.html")
			$a["team"] = "费城76人";
		else if($subject == "http://www.stat-nba.com/team/PHO.html")
			$a["team"] = "菲尼克斯太阳";
		else if($subject == "http://www.stat-nba.com/team/POR.html")
			$a["team"] = "波特兰开拓者";
		else if($subject == "http://www.stat-nba.com/team/SAC.html")
			$a["team"] = "萨克拉门托国王";
		else if($subject == "http://www.stat-nba.com/team/SAS.html")
			$a["team"] = "圣安东尼奥马刺";
		else if($subject == "http://www.stat-nba.com/team/TOR.html")
			$a["team"] = "多伦多猛龙";
		else if($subject == "http://www.stat-nba.com/team/UTA.html")
			$a["team"] = "犹他爵士";
		else if($subject == "http://www.stat-nba.com/team/WAS.html")
			$a["team"] = "华盛顿奇才";
		//print_r($index)
		//echo $values[($index["MISTAKE"][1])]["value"];
		for($i = 0; $i < count($index["NAME"]); $i++) 
		{
                if(isset($values[($index["NAME"][$i])]["value"])) 
				{
                    $a["mistake"] = $values[($index["MISTAKE"][$i])]["value"];
                    $a["foul"] = $values[($index["FOUL"][$i])]["value"];
					$a["steal"] = $values[($index["STEAL"][$i])]["value"];
					$a["board"] = $values[($index["BOARD"][$i])]["value"];
					$a["assist"] = $values[($index["ASSIST"][$i])]["value"];
					$a["block"] = $values[($index["BLOCK"][$i])]["value"];
					$a["goal"] = $values[($index["GOAL"][$i])]["value"];
					$a["name"] = $values[($index["NAME"][$i])]["value"];
					$mistake = $a["mistake"];
					$foul = $a["foul"];
					$steal = $a["steal"];
					$board = $a["board"];
					$assist = $a["assist"];
					$block = $a["block"];
					$goal = $a["goal"];
					$name = $a["name"];
					$team = $a["team"];
					
                    //加入数据库
                    mysql_query("insert player_info values('$name','$team','$assist','$goal','$board','$steal','$block','$mistake','$foul')", $con);
                }
				
        }       
        xml_parser_free($xmlparser);
        //mysql_close($con);
        //删除所有XML文件
       /* $dir = "C:\\Users\\Administrator\\DataScraperWorks\\wbh_test2";
        deldir($dir);

        function deldir($dir) {
            $dh=opendir($dir);
            while ($file=readdir($dh)) {
                if($file!="." && $file!="..") {
                    $fullpath=$dir."/".$file;
                    if(!is_dir($fullpath)) {
                        unlink($fullpath);
                    } else {
                        deldir($fullpath);
                    }
                }
            }
            closedir($dh);
            if(rmdir($dir)) {
                return true;
            } else {
                return false;
            }
        }*/
        }
?>