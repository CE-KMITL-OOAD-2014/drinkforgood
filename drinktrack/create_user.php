<?php
	include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/User.php"); 
	$user = new User();
	if (isset($_POST['checkname']))
	{
			$user->checkNameDup();
	}
	if (isset($_POST['back']))
	{
		header("location:login.php");
		//header("location:main_page.php");
	}
	if (isset($_POST['create']))
	{
		if(trim($_POST["txtUsername"]) == "")
		{
			echo "Please input Username!";
			exit();	
		}
		
		if(trim($_POST["txtPassword"]) == "")
		{
			echo "Please input Password!";
			exit();	
		}	
			
		if($_POST["txtPassword"] != $_POST["txtRePass"])
		{
			echo "Password not Match!";
			exit();
		}
		
		if(trim($_POST["txtEmail"]) == "")
		{
			echo "Please input email!";
			exit();	
		}	
		if(trim($_POST["txtHeight"]) == "")
		{
			echo "Please input Height!";
			exit();	
		}	
		if(trim($_POST["txtWeight"]) == "")
		{
			echo "Please input Weight!";
			exit();
		}	
		if(trim($_POST["rdoSex"]) == "")
		{
			echo "Please choose sex";
			exit();
		}
		else if (trim($_POST["rdoSex"]) == "Man")
		{
			$sexChoose = "M";
		}
		else if(trim($_POST["rdoSex"]) == "Woman")
		{
			$sexChoose = "F";
		}
	
		$user->createUser($sexChoose);
		
	}
?>