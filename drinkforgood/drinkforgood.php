<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>DrinkforGood</title>
		<meta name="description" content="description">
		<meta name="author" content="DrinkforGood">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
		<link href="plugins/select2/select2.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
<?php
	mysql_connect("localhost","admin","A4m1n");
	//mysql_connect("103.253.73.86","admin","A4m1n");
	mysql_select_db("drinkwater");
?>
<body Onload="bodyOnload();">
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="drinkforgood.php">DrinkforGood</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<a href="#" class="show-sidebar">
						  <i class="fa fa-bars"></i>
						</a>
						<div id="search">
						
						</div>
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="img/glass.jpg" class="img-rounded" alt="avatar" />
									</div>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<?php
										   	session_start();
											$strSQL = "SELECT * FROM user where id='".$_SESSION["id"]."' ORDER BY id DESC";
											$objQuery = mysql_query($strSQL);
											$objResult = mysql_fetch_array($objQuery);
											if(!$objResult)
											{
												echo "don't have  data";
											}
											else
											{
												$name =  $objResult["UserName"];
											}
											echo ($name);
											session_write_close();
										?>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="home_page.php" class="active ajax-link">
						<i class="fa fa-dashboard"></i>
						<span class="hidden-xs">HOME</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-bar-chart-o"></i>
						<span class="hidden-xs">MAIN</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="content/main_page.php">User</a></li>
						<li><a class="ajax-link" href="content/edit_page.php">Edit user</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-table"></i>
						 <span class="hidden-xs">DRINK</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="content/record_drink_page.php">Record</a></li>
						<li><a class="ajax-link" href="content/glass_page.php">Editglass</a></li>
						
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-pencil-square-o"></i>
						 <span class="hidden-xs">Report</span>
					</a>
					<ul class="dropdown-menu">
						<li><a class="ajax-link" href="content/graph_page.php">Graph</a></li>
						<li><a class="ajax-link" href="content/record_view_page.php">View</a></li>
					</ul>
				</li>
		
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-list"></i>
						 <span class="hidden-xs">TIPS</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Good</a></li>
						<li><a href="ajax/page_register.html">Bad</a></li>
						
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-map-marker"></i>
						<span class="hidden-xs">ABOUT US</span>
					</a>
					<ul class="dropdown-menu">
						
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-picture-o"></i>
						 <span class="hidden-xs">CONTACT</span>
					</a>
					<ul class="dropdown-menu">
						
					</ul>
				</li>
				<li>
					 <a  href="logout.php">
						 <i class="fa fa-font"></i>
						 <span class="hidden-xs">LOGOUT</span>
					</a>
				</li>
				<li class="dropdown">
					
					<ul class="dropdown-menu">
					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-plus-square"></i>
								
							</a>
							<ul class="dropdown-menu">
						
								<li class="dropdown">
									<a href="#" class="dropdown-toggle">
										<i class="fa fa-plus-square"></i>
										>
									</a>
									<ul class="dropdown-menu">
										
										<li class="dropdown">
											<a href="#" class="dropdown-toggle">
												<i class="fa fa-plus-square"></i>
												
											</a>
											<ul class="dropdown-menu">
												
												<li class="dropdown">
													<a href="#" class="dropdown-toggle">
														<i class="fa fa-plus-square"></i>
													
													</a>
													<ul class="dropdown-menu">
														
														<li class="dropdown">
															<a href="#" class="dropdown-toggle">
																<i class="fa fa-plus-square"></i>	
															</a>
															<ul class="dropdown-menu">
																
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</li>
									
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div class="preloader">
			<!--	<img src="img/22.jpg" class="devoops-getdata" alt="preloader"/>
			-->
			</div>
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
	</div>
</div>
<script>
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
		//alert(timer);
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
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="js/devoops.js"></script>
</body>
</html>
<?php
	mysql_close();
?>
