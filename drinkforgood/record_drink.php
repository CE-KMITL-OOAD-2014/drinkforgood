<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<?php
		mysql_connect("localhost","admin","A4m1n");
		//mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
?>
<body>
	<?php
		if (isset($_POST['submit']))
		{
			session_start();
		//	echo $_POST["ddGlass"];
			$today = date("Y-m-d");  
			$strSQL = "INSERT INTO drink (userId,size,createDate) VALUES ('".$_SESSION["id"]."','".$_POST["ddGlass"]."','".$today."')";
		//	echo $strSQL;
			$objQuery = mysql_query($strSQL);
			echo "record Completed!<br>";				
				echo "<br> Go to <a href='drinkforgood.php#content/record_drink_page.php'>record drink</a>";
		}
		if (isset($_POST['del']))
		{
				session_start();
				$strSQL = "SELECT * FROM drink WHERE userId = '".$_SESSION["id"]."' Order by id DESC";
				$objQuery = mysql_query($strSQL);
				$objResult = mysql_fetch_array($objQuery);
				
				if(!$objResult)
				{
					echo "Username and Password Incorrect!";
				}
				else
				{

					 $objResult["id"];
					//echo $_SESSION["UserName"].$_SESSION["height"];
				
					//header("location:main_page.php");
					$lastId =  $objResult["id"];
					$strSQL = "DELETE from drink where (id='".$lastId."')";
				//	echo $strSQL;
					$objQuery = mysql_query($strSQL);
					echo "delete Completed!<br>";				
					echo "<br> Go to <a href='drinkforgood.php#content/record_drink_page.php'>record drink</a>";
				}
				session_write_close();
		}
	?>
</body>
</html>
<?php
	mysql_close();
?>