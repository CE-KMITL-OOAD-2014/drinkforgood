<?php
	if (isset($_POST['register']))
	{
			header("location:register_page.php");
	}
	if (isset($_POST['login']))
	{
		session_start();
		mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
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
				header("location:main_page.php");
		}
		mysql_close();
	}
?>
