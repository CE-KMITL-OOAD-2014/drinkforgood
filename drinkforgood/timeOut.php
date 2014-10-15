<html>
<head>
<script type='text/javascript'>
	var startFlag =0;
	//alert(startFlag);
</script>
<title>ThaiCreate.Com Tutorial</title>

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

<form name="frmMain" action="" method="post">
  <input type="submit" name="login" value="count" onclick="startCount()">
	<script language="JavaScript">
	//var timer = timer.glob;
	var timer =50;
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
		document.cookie="timeCount="+timer;
		var divs = document.getElementById("divshow");
		divs.innerHTML = timer;
		if(timer <= 0)
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
			timer--;
		}
		bodyOnload();
	}
	</script>
	<div id="divshow"></div>
</form>
</body>
</html>

