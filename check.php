<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 $id=$_GET[id];
	$result=mysql_query("select role from users where userId='$id' and role ='houseowner'");
	if(mysql_num_rows($result) >=1 )
	{
		header("location:ownerhomepage.php");
	}
	else
	{
		header("location:grouplist.php");
		die;
	}
 ob_end_flush(); ?>