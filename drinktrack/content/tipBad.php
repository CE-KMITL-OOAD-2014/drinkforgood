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
		mysql_connect("localhost","admin","A4m1n");
		//mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
?>
<body Onload="bodyOnload();">

    <div id="top" class="jumbotron">
      <div class="container">
        <h1>Tip Bad</h1>
        <div id="macbook">
          <div id="tour" class="carousel slide">
            <ol class="carousel-indicators">
              <li data-target="#tour" data-slide-to="0" class="active"></li>
              <li data-target="#tour" data-slide-to="1"></li>
              <li data-target="#tour" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
              <div class="item active">
                <img src="img/bad.jpg">
                <div class="carousel-caption">
                  Beautiful photos provided by <a href="http://unsplash.com">unsplash</a>
                </div>
              </div>
              <div class="item">
                <img src="img/bad4.jpg">
                <div class="carousel-caption">
                  Photo #2 Caption
                </div>
              </div>
              <div class="item">
                <img src="img/bad5.jpg">
                <div class="carousel-caption">
                  Photo #3 Caption
                </div>
              </div>
            </div> <!-- /.carousel-inner -->

            <a class="left carousel-control" href="#tour" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#tour" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
          </div> <!-- /#tour -->
        </div> <!-- /#macbook -->
      </div> <!-- /.container -->
    </div> <!-- /#top.jumbotron -->

	    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      $(".nav-link").click(function(e) {
        e.preventDefault();
        var link = $(this);
        var href = link.attr("href");
        $("html,body").animate({scrollTop: $(href).offset().top - 80}, 500);
        link.closest(".navbar").find(".navbar-toggle:not(.collapsed)").click();
      });
    </script>
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

