<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<?php
		mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
?>
<body>
<br>
	<?php
				session_start();		
				$strSQL = "SELECT * FROM drink where userId='".$_SESSION["id"]."' ORDER BY id DESC";
				$objQuery = mysql_query($strSQL);
				$objResult = mysql_fetch_array($objQuery);
				if(!$objResult)
				{
					echo "don't have last data";
				}
				else
				{
					$size = $objResult["size"];
					$date = $objResult["createDate"];
					echo "last glass is size= ".$size."ml";
					echo " record at ".$date;
				}
	?>
	<form action="record_drink.php" method="post" name="form1">
		List Menu<br>
		  <select name="ddGlass">
			<option value=""><-- Please Select Item --></option>
			<?php
				$strSQL = "SELECT * FROM glass where status='Y' ORDER BY id ASC";
				$objQuery = mysql_query($strSQL);
				while($objResuut = mysql_fetch_array($objQuery))
				{
			?>
				<option value="<?php echo $objResuut["size"];?>">
							   <?php echo $objResuut["name"]." - ".$objResuut["size"]." ml"; ?>
				</option>
			<?php
			}
			?>
		  </select>
		<input type="submit" name="btnSubmit"  value="Submit">
	</form>
	  <br>
		 <a href="record_view_page.php">view page</a><br>
	  <br>
		<a href="main_page.php">main page</a><br>
</body>
</html>
<?php
	mysql_close();
?>