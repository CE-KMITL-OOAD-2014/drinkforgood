<?php
	include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/User.php"); 
	if (isset($_POST['register']))
	{
			header("location:register_page.php");
	}
	if (isset($_POST['login']))
	{
			$user = new User();
			$user->checkLogin();
	}
?>
