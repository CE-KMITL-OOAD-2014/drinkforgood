<html>
<head>
<title>ThaiCreate.Com Tutorials</title>
</head>
<body>
  Welcome to Admin Page! <br>
  <table border="1" style="width: 300px">
    <tbody>
      <tr>
        <td width="87"> &nbsp;Username</td>
        <td width="197">
		<?php
		
			session_start();
			mysql_connect("103.253.73.86","admin","A4m1n");
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
				$height = $objResult["height"];
				$weight = $objResult["weight"];
				$email = $objResult["UserEmail"];
			}
			echo $_SESSION["UserName"];
			?>
        </td>
      </tr>
      <tr>
        <td width="87"> &nbsp;Sex</td>
        <td width="197"><?php
			echo $_SESSION["sex"];
			?>
        </td>
      </tr>
      <tr>
        <td width="87"> &nbsp;Height</td>
        <td width="197"><?php 	
			//echo $_SESSION["height"];
			echo $height;
			?>
        </td>
      </tr>
        <tr>
        <td width="87"> &nbsp;Weight</td>
        <td width="197"><?php 	
			//echo $_SESSION["weight"];
				echo $weight;
			?>
        </td>
      </tr>
	   <tr>
        <td width="87"> &nbsp;email</td>
        <td width="197"><?php 	
			//echo $_SESSION["weight"];
				echo $email;
			?>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <a href="edit_page.php">Edit</a><br>
  <br>
    <a href="record_drink_page.php">record drink</a><br>
  <br>
	<a href="logout.php">Logout</a><br>
</body>
</html>