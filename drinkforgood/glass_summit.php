<?php
	if (isset($_POST['back']))
	{
		//	header("location:main_page.php");
		echo "<meta http-equiv='refresh' content='0;url= record_drink_page.php'>" ;
	}
	if (isset($_POST['summit']))
	{
		if(trim($_POST["nameTx"]) == "")
		{
			echo "Please input name!";
			exit();	
		}	
		if(trim($_POST["sizeTx"]) == "")
		{
			echo "Please input size!";
			exit();	
		}	

		session_start();
		mysql_connect("localhost","admin","A4m1n");
		//mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
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
		session_write_close();
		$strSQL = "INSERT INTO glass (userId,name,size,status) VALUES ('".$idSearch."','".$_POST["nameTx"]."', 
		'".$_POST["sizeTx"]."','Y')";
		echo $strSQL;
		$objQuery = mysql_query($strSQL);
		echo "summit Completed!<br>";		
		echo "<br> Go to <a href='content/drinkforgood.php#content/record_drink_page.php'>record page</a>";
		mysql_close();
	}
?>
