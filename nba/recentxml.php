<?php
        set_time_limit(10000);  //允许处理时间
        //连接数据库
        $con = mysql_connect('localhost', 'root', '') or 
            die ("connect failed" . mysql_error());
        mysql_select_db("nba") or die(mysql_error());
        mysql_query("set names 'utf8'");

        //处理每个XML文件,写入数据库
        foreach(glob("C:\\Users\\yll\\DataScraperWorks\\recent3to1\\*.xml") 
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
		//print_r($values);
		if(isset($values[($index["MISTAKE"]['0'])]["value"]))
		{
			$a["name"] = $values[($index["NAME"]['0'])]["value"];
			$a["board"] = $values[($index["BOARD"]['0'])]["value"];
			$a["assist"] = $values[($index["ASSIST"]['0'])]["value"];
			$a["block"] = $values[($index["BLOCK"]['0'])]["value"];
			$a["goal"] = $values[($index["GOAL"]['0'])]["value"];
			$a["mistake"] = $values[($index["MISTAKE"]['0'])]["value"];
			
			$name = $a["name"];
			$mistake = $a["mistake"];
			$board = $a["board"];
			$assist = $a["assist"];
			$block = $a["block"];
			$goal = $a["goal"];
			mysql_query("insert into recent_info values('$name','$board','$assist','$block','$mistake','$goal')", $con);
		}
		else
		{
			$a["name"] = $values[($index["NAME"]['0'])]["value"];
			$name = $a["name"];
			mysql_query("insert into recent_info values('$name','0','0','0','0','0')", $con);
		}
        xml_parser_free($xmlparser);
        }
?>