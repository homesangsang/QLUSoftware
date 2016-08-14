<?php
	if (isset($_REQUEST['authcode']) ) {
		session_start();
		if (strtolower($_REQUEST['authcode'] ) == $_SESSION['authcode']) {
			$name = $_POST['lognumber'];
			$pass = $_POST['logpassword'];
			$link = @mysql_connect("115.28.155.3","houxiaojun","123456") or die("error".mysql_error());
			mysql_select_db("test",$link);
			mysql_query("set names utf8",$link);
			$a = mysql_query("select username,passwd from user_info where username='$name' and passwd=md5('$pass') or phonenumber='$name' and passwd=md5('$pass')",$link);
			$a= mysql_fetch_array($a);
			if($a){
				echo $a['username'];
			}else{
				echo "logerror";
			}
	}else{
		echo "authcode0";
	}
}