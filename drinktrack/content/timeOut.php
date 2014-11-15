<html>
<head>
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
<script type='text/javascript'>
	var startFlag =0;
	//alert(startFlag);
</script>
<title>ThaiCreate.Com Tutorial</title>

<style>
	td { border: 1px solid gray;  height: 50px; width: 300px; }
	td.graph .bar {
		height: 18px;
		float: left;
	}

	.green { background: green; width: 60%; }
	.red { background: red; width: 10%; }
	.yellow { background: yellow; width: 30%; }
</style>
</head>
<script src="js/jquery.min.js"></script>

<body Onload="bodyOnload();">

<!--
<body >
<script>
document.cookie = 'name=David' ;
</script>
Page: get_cookie.php
<?php
var_dump($_COOKIE['name']);
?>
-->

<table>
    <tr>
        <td class="graph">
            <div class="bar green" id ="GBar"></div>
            <div class="bar red"></div>
            <div class="bar yellow"></div>            
        </td>
    </tr>
</table>

<form name="frmMain" action="" method="post">
  <input type="submit" name="login" value="count" onclick="startCount()">
	<script language="JavaScript">
	//var timer = timer.glob;
	var timer =20;
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
		timer = 100;
		document.cookie="timeCount="+timer;
		//alert(timer+"tt");
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
		var divs = document.getElementById("divshow");
		divs.innerHTML = getTime;
		if(getTime <= 0)
		{
			if(oneTime==1)
			{
				oneTime = 0;
				document.cookie="flag=0"+";";
				window.location = "main_page.php";
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
</form>
</body>
</html>

