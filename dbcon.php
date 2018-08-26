<?php
session_start();
error_reporting(E_ALL);
 	$con =  mysqli_connect('localhost','root','','sms');

	if ($con == false)
	{
		echo "No connection to Database";
	}
	
	date_default_timezone_set("Asia/Kolkata");
?>