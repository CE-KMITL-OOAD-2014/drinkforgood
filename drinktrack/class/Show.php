<?php
	include_once ($_SERVER['DOCUMENT_ROOT']."/drinkTrack/class/init_db.php"); 
	$db = new MySQL();
	$db->initMySQL();	
?>
<script>
function Show (forOneDay) {
    this.forOneDay = forOneDay;
    this.bar = showBar;
	this.graph = showGraph;
}
function showGraph()
{
	 var dataAry = <?php 
					session_start();
					//$_SESSION["id"] = '1';
					$strSQL = "SELECT id,size,createDate FROM drink where userId='".$_SESSION["id"]."' ORDER By ID ASC" ;
					if(isset($_GET['q']))
					{
						$monthChosen =$_GET['q'];
					}
					else
					{
						$monthChosen =0;
					}
				
					$strSQL = "select sum(size) AS sum,DAY(createDate) AS day from drink where userId = ".$_SESSION["id"]." and (createDate BETWEEN '2014-".$monthChosen."-01' and '2014-".$monthChosen."-31') GROUP BY createDate ORDER BY createDate ASC";
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
				 var montnSelect = <?php 
				if(isset($_GET['q']))
				{
					echo json_encode($_GET['q']);
				}
				else
				{
					echo json_encode("0");
				}
				 ?>;
			
				$("#chart").kendoChart({
					title: {
						text: "drink water graph at month=" + montnSelect
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
function showBar() { 
	var resultToday = <?php  
				$today = date("Y-m-d");  
				$strSQL = "select sum(size) AS sum,DAY(createDate) AS day from drink where createDate='".$today."' and userId='".$_SESSION["id"]."'";
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
			var forOne = this.forOneDay;
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
   // return this.color + ' ' + this.type + ' apple';
}
</script>