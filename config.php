<?php
// $hostname="localhost"; //mysql地址
// $basename="root"; //mysql用户名
// $basepass=""; //mysql密码
// $database="waddt"; //mysql数据库名称

 $hostname="mysql"; //mysql地址
 $basename="root"; //mysql用户名
 $basepass="123456"; //mysql密码
 $database="wadt"; //mysql数据库名称

 $v_question_count = 20; //总题目数
 $v_question_select_num =3; //在答题活动中一共有多少道题目

 $conn=mysql_connect($hostname,$basename,$basepass)or die("error!"); //连接mysql
 mysql_select_db($database,$conn); //选择mysql数据库
 mysql_query("set names 'utf8'");//mysql编码
?>
