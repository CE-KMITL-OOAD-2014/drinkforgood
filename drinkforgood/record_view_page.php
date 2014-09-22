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
	   echo "username = ".$_SESSION["UserName"];
	   $strSQL = "SELECT id,size,createDate FROM drink where userId='".$_SESSION["id"]."' ORDER By ID ASC" ;
	
	   $objQuery = mysql_query($strSQL)

	?>
	<table width="600" border="1">
	  <tr>
		<th width="60"> <div align="center">ID </div></th>
		<th width="70"> <div align="center">size </div></th>
		<th width="100"> <div align="center">createDate </div></th>
	  </tr>
	<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?php echo $objResult["id"];?></div></td>
		<td><div align="center"><?php echo $objResult["size"];?></td>
		<td><div align="center"><?php echo $objResult["createDate"];?></td>
	  </tr>
	<?php
	}
	?>
	  <br>
		 <a href="record_drink_page.php">back</a><br>
</body>
</html>
<?php
	mysql_close();
?>