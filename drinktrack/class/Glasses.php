<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/init_db.php"); 
Class Glasses
{
	function setSizeGlasses() // set size glass
	{
		session_start();
		$db = new MySQL();
		$db->initMySQL();
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
		mysql_close();
	}
	function displayMaxGlass() 	// display how many ml for today
	{
		$db = new MySQL();
		$db->initMySQL();
		//session_start();	
		$strSQL = "SELECT * FROM user where id='".$_SESSION["id"]."' ORDER BY id DESC";
				$objQuery = mysql_query($strSQL);
				$objResult = mysql_fetch_array($objQuery);
				if(!$objResult)
				{
					echo "don't have last data";
					return 0;
				}
				else
				{
					$weight =  $objResult["weight"];
					$height =  $objResult["height"];
					$cal = ($weight * 66)/2;
					return $cal;
				}
	}
	function lastGlass() 	// display last glass
	{
		$db = new MySQL();
		$db->initMySQL();
		
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
	}
    function AddGlasses($chooseGlass)   
	{  
		$db = new MySQL();
		$db->initMySQL();
		
		$today = date("Y-m-d"); 
		$strSQL = "INSERT INTO drink (userId,size,createDate) VALUES ('".$_SESSION["id"]."','". $chooseGlass."','".$today."')";
		$objQuery = mysql_query($strSQL);
		return TRUE;
	}
	function RemoveGlass()
	{
				
				$db = new MySQL();
				$db->initMySQL();
		
				$strSQL = "SELECT * FROM drink WHERE userId = '".$_SESSION["id"]."' Order by id DESC";
				$objQuery = mysql_query($strSQL);
				$objResult = mysql_fetch_array($objQuery);
				if(!$objResult)
				{
					echo "Username and Password Incorrect!";
				
					return FALSE;
				}
				else
				{
					 $objResult["id"];
					//echo $_SESSION["UserName"].$_SESSION["height"];
					//header("location:main_page.php");
					$lastId =  $objResult["id"];
					$strSQL = "DELETE from drink where (id='".$lastId."')";
					$objQuery = mysql_query($strSQL);
			
					return TRUE;
				}
	}
}
?>