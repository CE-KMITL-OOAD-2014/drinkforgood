<?php
	session_start();
	$_SESSION["UserName"] = "";
	$_SESSION["sex"] = "";
	session_write_close();
	header("location:login.php");
?>