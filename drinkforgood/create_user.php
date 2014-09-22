<?php

	if (isset($_POST['checkname']))
	{
		session_start();
		mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
		$strSQL = "SELECT * FROM user WHERE UserName = '".mysql_real_escape_string($_POST['txtUsername'])."'";
		
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		if(!$objResult)
		{
			echo "these username can use";
		}
		else
		{
			echo "name duplicate";
		}
		session_write_close();
		mysql_close();
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

		mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
		$strSQL = "SELECT * FROM user WHERE UserName = '".trim($_POST['txtUsername'])."' ";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		if($objResult)
		{
				echo "Username already exists!";
		}
		else
		{	
			$strSQL = "INSERT INTO user (UserName,UserPassword,UserEmail,height,weight,sex) VALUES ('".$_POST["txtUsername"]."', 
			'".$_POST["txtPassword"]."','".$_POST["txtEmail"]."','".$_POST["txtHeight"]."','".$_POST["txtWeight"]."','".$sexChoose."')";
			$objQuery = mysql_query($strSQL);
			echo "Register Completed!<br>";		
			echo "<br> Go to <a href='login.php'>Login page</a>";
		}

		mysql_close();
		
	}
?>