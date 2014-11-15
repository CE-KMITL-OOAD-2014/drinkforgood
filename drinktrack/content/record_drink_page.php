<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <meta charset="utf-8">
     <link href="examples/content/shared/styles/examples-offline.css" rel="stylesheet">
    <link href="styles/kendo.common.min.css" rel="stylesheet">
    <link href="styles/kendo.rtl.min.css" rel="stylesheet">
    <link href="styles/kendo.default.min.css" rel="stylesheet">
    <link href="styles/kendo.dataviz.min.css" rel="stylesheet">
    <link href="styles/kendo.dataviz.default.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/kendo.all.min.js"></script>
    <script src="examples/content/shared/js/console.js"></script>
	  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
	include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/Glasses.php"); 
	include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/init_db.php"); 
	include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/Show.php"); 

	$db = new MySQL();
	$db->initMySQL();	
?>
<body Onload="bodyOnload();">
		<br>
		 <h4>Record Drink</h4>
		<br>
		<?php			
			$Glasses = new Glasses();
			// display last glass
			$Glasses->lastGlass();
			// display how many ml for today
			$forOneDay =$Glasses->displayMaxGlass();
		?>
	<form action="record_drink.php" method="post" name="form1">		
		<input type="submit" name="del"  value="undo">
		 <br>
		  <select name="ddGlass">
			<option value=""><-- Please Select Item --></option>
			<?php
				session_start();	
				$strSQL = "SELECT * FROM glass where status='Y' and userId='".$_SESSION["id"]."' ORDER BY id ASC";
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
		<input type="submit" name="submit"  value="Submit" onclick="startCount()">
	</form>
    </div>
    <style scoped>
        .demo-section {
            min-height: 200px;
        }
        .demo-section .box-col li {
            margin: 0;
        }
    </style>
</div>
<?php
echo " You shoud have drink ".$forOneDay."ml for a day";
?>

<div class="progress" id="maxBar"style="width: 1000px">
  <div class="progress-bar progress-bar-danger progress-bar-striped" id="bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
    0%
  </div>
</div>
<script>
	$( document ).ready(function() {
		var forOne = <?php 
							echo json_encode($forOneDay);  
					 ?>;
		var show = new Show(forOne);
		show.bar();
		//alert("ready"+flagChk);
});

	//count down part
	var oneTime = 1;
	
	function bodyOnload()
	{		

		var flagChk = getCookie("flag");
		//alert(flagChk);
		if(flagChk>0)
		{
			setTimeout("showTimmer();",1000);
		}
	}

	function startCount()
	{
		timer = 3600; 
		//	alert(timer) 1hr = 3600 sec ;
		document.cookie="timeCount="+timer;	
		document.cookie="flag=1"+";";
		bodyOnload();

	}
	function getCookie(name) {
	  var value = "; " + document.cookie;
	  var parts = value.split("; " + name + "=");
	  if (parts.length == 2) return parts.pop().split(";").shift();
	}
	function showTimmer()
	{
		var getTime=getCookie("timeCount");
		//alert(getTime);
		var divs = document.getElementById("divshow");
		divs.innerHTML = getTime;
		if(getTime <= 0)
		{
			if(oneTime==1)
			{
				oneTime = 0;
				alert("please drink a water");
				document.cookie="flag=0"+";";
				//window.location = "main_page.php";
			}
		}
		else
		{
			getTime--;
		}
		document.cookie="timeCount="+getTime;
		bodyOnload();
	}
</script>
	<div id="divshow"></div>
</body>
</html>
<?php
	mysql_close();
?>

