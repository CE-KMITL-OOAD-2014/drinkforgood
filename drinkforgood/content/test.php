<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").addClass("important blue");
//    $("#tong").addClass("yellow ");
	//$("#tong").removeClass("green");
	$("#tong").css("width","10%");
	$("#tong").css("background","blue");
  });
});
function createChart() {
  $("#div1").addClass("important blue");
  
//$("#tong").addClass("yellow ");
  $("#tong").removeClass("green");
}
</script>
<style>
.important
{
font-weight:bold;
font-size:xx-large;
}
.blue
{
//color:blue; width:100px;
color:red; width:10000px;
}

td { border: 1px solid gray;  height: 50px; width: 300px; }
td.graph .bar {
    height: 18px;
    float: left;
}
.green { background: green; width: 30% }
.red { background: red; width: 10%; }
.yellow { background: yellow; width: 30%; }
</style>
</head>
<body>
<div id="div1">This is some text.</div>
<div id="div2">This is some text.</div>
<br>
<button>Add classes to first div element</button>

<table>
    <tr>
        <td class="graph">
             
            <div id="tong" class="bar green"></div>
            <div class="bar red"></div>
            <div class="bar yellow"></div>            
        </td>
    </tr>
</table>
</body>
</html>