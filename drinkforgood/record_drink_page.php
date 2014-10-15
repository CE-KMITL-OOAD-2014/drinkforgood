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
		 <h4>Record Drink</h4>
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

