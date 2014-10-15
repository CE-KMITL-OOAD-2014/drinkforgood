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
		mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
?>
<body Onload="bodyOnload();">

	<div id="divshow"></div>

    <div id="example" ng-app="KendoDemos">
    <div class="demo-section k-content" ng-controller="MyCtrl">
        <div class="box-col">
            <h4>drink water web</h4>
              <ul kendo-menu style="display: inline-block; min-width: 150px;"
                k-orientation="menuOrientation"
                k-rebind="menuOrientation"
                k-on-select="onSelect(kendoEvent)">
              <li>
                Main
                <ul>
				  <li>User</li>
				  <li>Edit User</li>
                  <li>Log out</li>
                </ul>
              </li>
              <li>
                Drink
                <ul>
                  <li>Record</li>
                  <li>Edit Glass</li>
                </ul>
              </li>
              <li>
                Report
                <ul>
                  <li>Graph</li>
				  <li>View</li>
                </ul>
              </li>
			  <li>
                Alarm
                <ul>
                  <li>Setting</li>
                </ul>
              </li>
            </ul>
        </div>
		<br>
		 <h4>Report Graph</h4>
		<br>
	   <div id="graph">
		<div class="demo-section k-content">
			<div id="chart" style="background: center no-repeat url('../content/shared/styles/world-map.png');"></div>
		</div>
		<script>
			function createChart() {
				 var dataAry = <?php 
					session_start();
					$_SESSION["id"] = '1';
					$strSQL = "SELECT id,size,createDate FROM drink where userId='".$_SESSION["id"]."' ORDER By ID ASC" ;
					$monthChosen = 9;
					$strSQL = "select sum(size) AS sum,DAY(createDate) AS day from drink where userId = '1' and (createDate BETWEEN '2014-".$monthChosen."-01' and '2014-".$monthChosen."-31') GROUP BY createDate ORDER BY createDate ASC";
					$objQuery = mysql_query($strSQL);
				
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
						 $data[$i][0]=$objResult["day"];
						 $data[$i][1]=$objResult["sum"];
						 $i++;
					}
					$timeData = $i;
					$resultEcho=array("0","0","0","0","0","0","0","0","0","0",
					"0","0","0","0","0","0","0","0","0","0",
					"0","0","0","0","0","0","0","0","0","0","0");
					for($i=0;$i<$timeData;$i++)
					{
						for($j=0;$j<31;$j++)
						{
							if( $data[$i][0]==$j)
							{
								if($j>0)
								{
									$k=$j-1;
								}
								$resultEcho[$k]=$data[$i][1];
							//	echo"Name $j: $resultEcho[$j] <br>";
							}

						}
					}
					 echo json_encode($resultEcho); 
				 ?>;
				var montnSelect = <?php  echo json_encode("Septempber");  
									?>;
				$("#chart").kendoChart({
					title: {
						text: "drink water graph at " + montnSelect
					},
					legend: {
						position: "bottom"
					},
					chartArea: {
						background: ""
					},
					seriesDefaults: {
						type: "line",
						style: "smooth"
					},
					series: [{
						name: "",
						data: [dataAry[0], dataAry[1], dataAry[2], dataAry[3], dataAry[4], dataAry[5], dataAry[6],  dataAry[7], dataAry[8],  dataAry[9]
						,dataAry[10], dataAry[11], dataAry[12], dataAry[13], dataAry[14], dataAry[15], dataAry[16],  dataAry[17], dataAry[18],  dataAry[19]
						,dataAry[20], dataAry[21], dataAry[22], dataAry[23], dataAry[24], dataAry[25], dataAry[26],  dataAry[27], dataAry[28],  dataAry[29]
						,dataAry[30]
						]
					}
					],
					valueAxis: {
						labels: {
							format: "{0} ml"
						},
						line: {
							visible: false
						},
						axisCrossingValue: -10
					},
					categoryAxis: {
						categories: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
						majorGridLines: {
							visible: true
						}
					},
					tooltip: {
						visible: true,
						format: "{0}%",
						template: "#= series.name #: #= value #"
					}
				});
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
  angular.module("KendoDemos", [ "kendo.directives" ]);
  function MyCtrl($scope){
      $scope.menuOrientation = "horizontal";
      $scope.onSelect = function(ev) {
         // alert($(ev.item.firstChild).text());
		 $msg = $(ev.item.firstChild).text();
		 //alert($msg);
		 switch($msg)
		 {
			 case "User":
				 window.location =  "/drinkTrack/main_page.php"
			 break;
			 case "Edit User":
				 window.location =  "/drinkTrack/edit_page.php"
			 break;
			 case "Log out":
				 window.location =  "/drinkTrack/logout.php"
			 break;
			 case "Record":
				 window.location =  "/drinkTrack/record_drink_page.php"
			 break;
			 case "Edit Glass":
				 window.location =  "/drinkTrack/glass_page.php"
			 break;
			 case "Graph":
				 window.location =  "/drinkTrack/graph_page.php"
			 break;
			 case "View":
				 window.location =  "/drinkTrack/record_view_page.php"
			 break;
			 case "Setting":
				 window.location =  "/drinkTrack/setting_alarm_page.php"
			 break;
		  }
//		  if($msg == "Record")
//		  {
//			  window.location =  "/drinkTrack/main_page.php"
//		  }
		
      };
  }


	//count down part
	//var timer =10;
	var url = "http://www.thaicreate.com";
	var oneTime = 1;

	function bodyOnload()
	{		
		//delete_cookie("flag");
		//	window.location = "main_page.php";
		//var flagg = document.cookie;
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
	function delete_cookie( name ) {
		 document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
	function startCount()
	{
		document.cookie="flag=1"+";";
		bodyOnload();
		//setTimeout("showTimmer();",1000);
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

