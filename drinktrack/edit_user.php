<?php
	if (isset($_POST['back']))
	{
		//	header("location:main_page.php");
		echo "<meta http-equiv='refresh' content='0;url= main_page.php'>" ;
	}
	if (isset($_POST['edit']))
	{
			include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/init_db.php"); 
			$db = new MySQL();
			$db->initMySQL();	
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
			$idSearch = $objResult["id"];
		}
		$_SESSION["height"] = $objResult["height"];
		$_SESSION["weight"] = $objResult["weight"];
		session_write_close();
		$strSQL = "update user set  UserEmail ='".$_POST["txtEmail"]."', weight ='".$_POST["txtWeight"]."', height ='".$_POST["txtHeight"]."' where  ID = '".mysql_real_escape_string($idSearch)."'";
		$objQuery = mysql_query($strSQL);
		echo "Edit Completed!<br>";		
		echo "<br> Go to <a href='drinkforgood.php#content/main_page.php'>main page</a>";
		mysql_close();
	}
?>
