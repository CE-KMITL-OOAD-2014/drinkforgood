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
 	
</head>
<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/init_db.php"); 
include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/Show.php"); 
$db = new MySQL();
$db->initMySQL();
?>
<body Onload="bodyOnload();">
		<br>
		 <h4>Report Graph</h4>
		<br>
	   <div id="graph">
		<div class="demo-section k-content">
			<div id="chart" style="background: center no-repeat url('../content/shared/styles/world-map.png');"></div>
		</div>
		<form>
			<select name="users" onchange="showUser(this.value)">
			<option value="">Select a month:</option>
			<option value="1" id="January">January</option>
			<option value="2">February</option>
			<option value="3">March</option>
			<option value="4">April</option>
			<option value="5">May</option>
			<option value="6">June</option>
			<option value="7">July</option>
			<option value="8">August</option>
			<option value="9">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
			</select>
		</form>
		

	</form>
	
	
		<script>
		$( document ).ready(function() {
			createChart();
		});
		function showUser(str)
		{
	
			window.location = "drinkforgood.php#content/graph_page.php?q="+str;
			location.reload();
		}
			function createChart() {
					var show = new Show('0');
					show.graph();
			}

			$(document).ready(createChart);
			$(document).bind("kendo:skinChange", createChart);
		</script>
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

<script>
	//count down part
	//var timer =10;
	var url = "http://www.thaicreate.com";
	var oneTime = 1;

	function bodyOnload()
	{		

		var flagChk = getCookie("timeCount");
		//alert(flagChk);
		if(flagChk>0)
		{
		//	alert("1234");
			setTimeout("showTimmer();",1000);
		}
		else
		{
		//	alert("what");
		}

	}


	function getCookie(name) {
	  var value = "; " + document.cookie;
	  var parts = value.split("; " + name + "=");
	  if (parts.length == 2) return parts.pop().split(";").shift();
	}
	function showTimmer()
	{
		var timer=getCookie("timeCount");
		var divs = document.getElementById("divshow");
		divs.innerHTML = timer;
		if(timer <= 0)
		{
			if(oneTime==1)
			{
				oneTime = 0;
				alert("ALERT JAAAA");
				document.cookie="timeCount=0";
				document.cookie="flag=0"+";";
			}
		}
		else
		{
			timer--;
		}
		document.cookie="timeCount="+timer;
		bodyOnload();
	}
	</script>
	<div id="divshow"></div>
</body>
</html>
<?php
	mysql_close();
?>

