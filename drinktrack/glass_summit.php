<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/Glasses.php"); 

	if (isset($_POST['back']))
	{
		//	header("location:main_page.php");
		
			
		//echo "<meta http-equiv='refresh' content='0;url= record_drink_page.php'>" ;
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

			$Glasses = new Glasses();
			$Glasses->setSizeGlasses();
				echo "record Completed!<br>";				
				echo "<br> Go to <a href='drinkforgood.php#content/record_drink_page.php'>record drink</a>";
	}
?>
