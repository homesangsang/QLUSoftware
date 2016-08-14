<?php
$phone = $_POST['phone'];
$pass = $_POST['password'];
$link = @mysql_connect("115.28.155.3","houxiaojun","123456") or die("error".mysql_error());
mysql_select_db("test",$link);
mysql_query("set names utf8",$link);
$b = mysql_query("select * from user_info where phonenumber='$phone'",$link);
$b= mysql_fetch_array($b);
if($b){
	$a = mysql_query("update user_info set passwd=md5('$pass') where phonenumber='$phone'",$link);
	if($a){
		echo "1";
	}else{
		echo "0";
	}
}else{
	echo "none";
}
