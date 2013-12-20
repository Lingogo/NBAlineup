<?php
        $con = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS) or 
            die ("connect failed" . mysql_error());
        mysql_select_db("app_nbaline") or die(mysql_error());
        mysql_query("set names 'utf-8'");

        //处理每个XML文件,写入数据库
        foreach(glob("C:\\Users\\yll\\DataScraperWorks\\sinaNBA3to1\\*.xml") 
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
		//print_r($index);
		//echo $values[($index["TEAM"][0])]["value"];
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
					$a["team"] = $values[($index["TEAM"][$i])]["value"];
					if($a["team"] == "老鹰队")
						$a["team"] = "亚特兰大老鹰";
					else if($a["team"] == "篮网队")
						$a["team"] = "布鲁克林篮网";
					else if($a["team"] == "山猫队")
						$a["team"] = "夏洛特山猫";
					else if($a["team"] == "凯尔特人队")
						$a["team"] = "波士顿凯尔特人";
					else if($a["team"] == "公牛队")
						$a["team"] = "芝加哥公牛";
					else if($a["team"] == "骑士队")
						$a["team"] = "克里夫兰骑士";
					else if($a["team"] == "小牛队")
						$a["team"] = "达拉斯小牛";
					else if($a["team"] == "掘金队")
						$a["team"] = "丹佛掘金";
					else if($a["team"] == "活塞队")
						$a["team"] = "底特律活塞";
					else if($a["team"] == "勇士队")
						$a["team"] = "金州勇士";
					else if($a["team"] == "火箭队")
						$a["team"] = "休斯顿火箭";
					else if($a["team"] == "步行者队")
						$a["team"] = "印第安纳步行者";
					else if($a["team"] == "快船队")
						$a["team"] = "洛杉矶快船";
					else if($a["team"] == "湖人队")
						$a["team"] = "洛杉矶湖人";
					else if($a["team"] == "灰熊队")
						$a["team"] = "孟菲斯灰熊";
					else if($a["team"] == "热火队")
						$a["team"] = "迈阿密热火";
					else if($a["team"] == "雄鹿队")
						$a["team"] = "密尔沃基雄鹿";
					else if($a["team"] == "森林狼队")
						$a["team"] = "明尼苏达森林狼";
					else if($a["team"] == "鹈鹕队")
						$a["team"] = "新奥尔良鹈鹕";
					else if($a["team"]== "尼克斯队")
						$a["team"] = "纽约尼克斯";
					else if($a["team"] == "雷霆队")
						$a["team"] = "俄克拉荷马雷霆";
					else if($a["team"] == "魔术队")
						$a["team"] = "奥兰多魔术";
					else if($a["team"] == "76人队")
						$a["team"] = "费城76人";
					else if($a["team"] == "太阳队")
						$a["team"] = "菲尼克斯太阳";
					else if($a["team"] == "开拓者队")
						$a["team"] = "波特兰开拓者";
					else if($a["team"] == "国王队")
						$a["team"] = "萨克拉门托国王";
					else if($a["team"] == "马刺队")
						$a["team"] = "圣安东尼奥马刺";
					else if($a["team"] == "猛龙队")
						$a["team"] = "多伦多猛龙";
					else if($a["team"] == "爵士队")
						$a["team"] = "犹他爵士";
					else if($a["team"] == "奇才队")
						$a["team"] = "华盛顿奇才";
						
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
                    mysql_query("update player_info set passist='$assist',pteam='$team',pgoal='$goal',pboard='$board',psteal='$steal',pblock='$block',pmistake='$mistake',pfoul='$foul' where pname='$name'", $con);
                }
				
        }     
		//mysql_query("insert into player_info values('$name','$team','$assist','$goal','$board','$steal','$block','$mistake','$foul')", $con);		
        xml_parser_free($xmlparser);
        }
?>