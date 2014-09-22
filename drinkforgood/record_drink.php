<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<?php
		mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
?>
<body>
	<?php
		session_start();
	//	echo $_POST["ddGlass"];
		$today = date("Y-m-d");  
		$strSQL = "INSERT INTO drink (userId,size,createDate) VALUES ('".$_SESSION["id"]."','".$_POST["ddGlass"]."','".$today."')";
	//	echo $strSQL;
		$objQuery = mysql_query($strSQL);
		echo "record Completed!<br>";				
		echo "<br> Go to <a href='record_drink_page.php'>record drink</a>";
	?>
</body>
</html>
<?php
	mysql_close();
?>