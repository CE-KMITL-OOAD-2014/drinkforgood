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
	$db = new MySQL();
	$db->initMySQL();	
?>
<body Onload="bodyOnload();">
<?php
	   session_start();		
	   echo "username = ".$_SESSION["UserName"];
	   $strSQL = "SELECT id,size,createDate FROM drink where userId='".$_SESSION["id"]."' ORDER By ID ASC" ;
	
	   $objQuery = mysql_query($strSQL)

	?>
	<table width="600" border="1">
	  <tr>
		<th width="60"> <div align="center">ID </div></th>
		<th width="70"> <div align="center">size </div></th>
		<th width="100"> <div align="center">createDate </div></th>
	  </tr>
	<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?php echo $objResult["id"];?></div></td>
		<td><div align="center"><?php echo $objResult["size"];?></td>
		<td><div align="center"><?php echo $objResult["createDate"];?></td>
	  </tr>
	<?php
	}
	?>
	  <br>
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

