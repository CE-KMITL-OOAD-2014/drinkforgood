<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/init_db.php"); 
Class User
{
	function checkLogin()
	{
		$db = new MySQL();
		$db->initMySQL();
		session_start();
		$strSQL = "SELECT * FROM user WHERE UserName = '".mysql_real_escape_string($_POST['txtUsername'])."' 
		and UserPassword = '".mysql_real_escape_string($_POST['txtPassword'])."'";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);
		if(!$objResult)
		{
				echo "Username and Password Incorrect!";
		}
		else
		{
				$_SESSION["id"]= $objResult["id"];
				$_SESSION["UserName"] = $objResult["UserName"];
				$_SESSION["sex"] = $objResult["sex"];
				$_SESSION["height"] = $objResult["height"];
				$_SESSION["weight"] = $objResult["weight"];
				//echo $_SESSION["UserName"].$_SESSION["height"];
				session_write_close();
				header("location:drinkforgood.php");
		}
		mysql_close();
	}
	function checkNameDup()
	{
		session_start();
		$db = new MySQL();
		$db->initMySQL();
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
	function createUser($sexChoose)
	{
		$db = new MySQL();
		$db->initMySQL();
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
	function displayDataUser()
	{
		$db = new MySQL();
		$db->initMySQL();
					session_start();
					$strSQL = "SELECT * FROM user WHERE UserName = '".mysql_real_escape_string($_SESSION["UserName"])."'";
					$objQuery = mysql_query($strSQL);
					$objResult = mysql_fetch_array($objQuery);
					if(!$objResult)
					{
						echo "can't find Id for this user name";
					}
					else
					{
						echo "  ".$_SESSION["UserName"];
//						$height = $objResult["height"];
//						$weight = $objResult["weight"];
//						$email = $objResult["UserEmail"];
						return $objResult;
					}
					
	}
}