
<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>

<body>
	<?php
		include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/Glasses.php"); 
		if (isset($_POST['submit']))
		{
			session_start();
			$today = date("Y-m-d");  
			$Glasses = new Glasses();
			$resultBoo=$Glasses->AddGlasses($_POST["ddGlass"]);
			if($resultBoo == TRUE)
			{
				echo "record Completed!<br>";				
				echo "<br> Go to <a href='drinkforgood.php#content/record_drink_page.php'>record drink</a>";
			}
			else
			{
				echo "record Fail!<br>";				
				echo "<br> Go to <a href='drinkforgood.php#content/record_drink_page.php'>record drink</a>";
			}
		
		}
		if (isset($_POST['del']))
		{
			session_start();
			$Glasses = new Glasses();
			$resultBoo=$Glasses->RemoveGlass();
			if($resultBoo == TRUE)
			{
				echo "delete Completed!<br>";				
				echo "<br> Go to <a href='drinkforgood.php#content/record_drink_page.php'>record drink</a>";
			}
			else
			{
				echo "delete Fail!<br>";				
				echo "<br> Go to <a href='drinkforgood.php#content/record_drink_page.php'>record drink</a>";
			}
		}
	?>
</body>
</html>




