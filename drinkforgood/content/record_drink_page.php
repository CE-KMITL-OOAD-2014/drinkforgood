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
		mysql_connect("localhost","admin","A4m1n");
	//	mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
?>
<body Onload="bodyOnload();">
		<br>
		 <h4>Record Drink</h4>
		<br>
		<?php
				// display last glass
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
	
		<?php
				// display how many ml for today
				$strSQL = "SELECT * FROM user where id='".$_SESSION["id"]."' ORDER BY id DESC";
				$objQuery = mysql_query($strSQL);
				$objResult = mysql_fetch_array($objQuery);
				if(!$objResult)
				{
					echo "don't have last data";
				}
				else
				{
					$weight =  $objResult["weight"];
					$height =  $objResult["height"];
					$forOneDay = ($weight * 66)/2;
				
				}
		?>
	<form action="record_drink.php" method="post" name="form1">		
		<input type="submit" name="del"  value="undo">
		 <br>
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
//progress-bar progress-bar-danger progress-bar-striped = red
//progress-bar progress-bar-success progress-bar-striped = green
//progress-bar progress-bar-warning progress-bar-striped = orange
?>

<div class="progress" id="maxBar"style="width: 1000px">
  <div class="progress-bar progress-bar-danger progress-bar-striped" id="bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
    0%
  </div>
</div>
<script>
	$( document ).ready(function() {
		var resultToday = <?php  
				$today = date("Y-m-d");  
				$strSQL = "select sum(size) AS sum,DAY(createDate) AS day from drink where createDate='".$today."'";
				$objQuery = mysql_query($strSQL);	
				$i = 0;
				while($objResult = mysql_fetch_array($objQuery))
				{
						 $data[$i][0]=$objResult["day"];
						 $data[$i][1]=$objResult["sum"];
						 $i++;
				}
				$sumData=$data[0][1];
				if($sumData == "")
				{
					$sumData = 0;
				}
				echo json_encode($sumData);  
				//echo json_encode($strSQL);  
			?>;
			var forOne = <?php  
								echo json_encode($forOneDay);  
						 ?>;
			var forOne_div = forOne/5;
			var resultPer = ((resultToday*100)/forOne); //+ ((resultToday*100)%forOne);
			//alert(resultPer);
			resultPer = resultPer.toFixed(2);
			if(resultPer > 100)
			{
				$("#bar").attr({
				"class": "progress-bar progress-bar-warning progress-bar-striped"
				});
					document.cookie="flag=0"+";";
			}
			if(resultPer < 70)
			{
				$("#bar").attr({
				"class": "progress-bar progress-bar-danger progress-bar-striped"
				});
			}
			if((resultPer > 70)&&(resultPer < 100))
			{
				$("#bar").attr({
				"class": "progress-bar progress-bar-success progress-bar-striped"
				});
				document.cookie="flag=0"+";";
			
			}
			$("#maxBar").attr({
				"style": "width: " + forOne_div +"px"
			});
			$("#bar").attr({
				"aria-valuenow": resultPer,
				"style": "width: " + resultPer +"%"	
			});
			$("#bar").text(resultPer  + "%");
			var flagChk = getCookie("flag");
		//alert("ready"+flagChk);
});

	//count down part
	//var timer =10;
	var url = "http://www.thaicreate.com";
	var oneTime = 1;
	
	function bodyOnload()
	{		
		//delete_cookie("flag");
		//	window.location = "main_page.php";
		//var flagg = document.cookie;
		var flagChk = getCookie("flag");
		//alert(flagChk);
		if(flagChk>0)
		{
			setTimeout("showTimmer();",1000);
		}
	}
	function delete_cookie( name ) {
		 document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
	function startCount()
	{
		timer = 30;
		//	alert(timer);
		document.cookie="timeCount="+timer;	
		document.cookie="flag=1"+";";
		bodyOnload();
		// var number = $("div").attr("GBar").match(/\d+$/);
//		 alert(number);
//		$("div").css({
//			"width": "10px",
//		
//		});
		//setTimeout("showTimmer();",1000);
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

