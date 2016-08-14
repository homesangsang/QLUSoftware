<?php
if($_POST['oldpas'] != 1){
	if (isset($_REQUEST['authcode4']) ) {
		session_start();
		if (strtolower($_REQUEST['authcode4'] ) == $_SESSION['authcode']) {
			$name = $_COOKIE['NAME'];
			$pass = $_POST['newpas'];
			$link = @mysql_connect("115.28.155.3","houxiaojun","123456") or die("error".mysql_error());
			mysql_select_db("test",$link);
			mysql_query("set names utf8",$link);
			$a = mysql_query("update user_info set passwd=md5('$pass') where username='$name'",$link);
			if($a){
				echo "1";
			}else{
				echo "error";
			}
		}else{
		echo "authcodenull";
		}
	}
}else{
	$pass = $_POST['pas'];
	$name = $_COOKIE['NAME'];
	$link = @mysql_connect("115.28.155.3","houxiaojun","123456") or die("error".mysql_error());
	mysql_select_db("test",$link);
	mysql_query("set names utf8",$link);
	$a = mysql_query("select username,passwd from user_info where username='$name' and passwd=md5('$pass')",$link);
	$a= mysql_fetch_array($a);
	if($a){
		echo "pas1";
	}else{
		echo "pas0";
	}
}