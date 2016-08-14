<?php
if($_POST['submit'] == "f"){
	if (isset($_REQUEST['authcode2']) ) {
		session_start();
		if(strtolower($_REQUEST['authcode2'] ) == $_SESSION['authcode']){
			echo "T";
		}else{
			echo "F";
		}
	}
}else{
	$number = $_POST['number'];
	$newnumber = $number;
	$name = $_POST['name'];
	$newname = $name;
	$pass = $_POST['password'];
	$newpass = $pass;
	$link = @mysql_connect("115.28.155.3","houxiaojun","123456") or die("error".mysql_error());
			mysql_select_db("test",$link);
			mysql_query("set names utf8",$link);
			$name = mysql_query("select * from user_info where username='$name'",$link);
			$name= mysql_fetch_array($name);
			$number = mysql_query("select * from user_info where phonenumber='$number'");
			$number = mysql_fetch_array($number);
			if(!$name&&!$number){
				mysql_query("insert into user_info(username,passwd,phonenumber) values('$newname',md5('$newpass'),'$newnumber')",$link);
				echo $newname;
			}else if($name){
				echo "rename";
			}else if($number){
				echo "renumber";
			}
}