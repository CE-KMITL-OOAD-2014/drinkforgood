<?php
Class MySQL
{
	function initMySQL()
	{
		mysql_connect("localhost","admin","A4m1n");
	    //mysql_connect("103.253.73.86","admin","A4m1n");
		mysql_select_db("drinkwater");
	}
}
?>