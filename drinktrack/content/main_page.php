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
<body Onload="bodyOnload();">

	
		<br>
		 <h4>User Profile</h4>
		<br>
		 <table border="1" style="width: 300px">
			<tbody>
			  <tr>
				<td width="87"> &nbsp;Username</td>
				<td width="197">
				<?php
					include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/User.php"); 
						$user = new User();
						// display last glass
						$objResult=$user->displayDataUser();
						$height = $objResult["height"];
						$weight = $objResult["weight"];
						$email = $objResult["UserEmail"];
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
		//delete_cookie("flag");
		//	window.location = "main_page.php";
		//var flagg = document.cookie;
		var flagChk = getCookie("timeCount");
		//alert(flagChk);
		if(flagChk>0)
		{
			//alert("1234");
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

