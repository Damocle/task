<?php 
	require_once '../connect.php';

	$username  = $_POST['username'];
	$password  = $_POST['password'];
	$repeatpwd = $_POST['repeatpwd'];

	if ($password == $repeatpwd) {
		$sql = "insert into user (username,password) values ('".$username."','".$password."')";
		
		if ($mysqli -> query($sql)) {
			header("location: login.html");
		} else {
			echo "<script>alert('注册失败！');window.location.href='registered.php';</script>";
		}
		
	} else {
		echo "<script>alert('前后密码输入不一致，请重新输入！');window.location.href='registered.php';</script>";
	}
?>