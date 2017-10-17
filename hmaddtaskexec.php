<?php
error_reporting(-1);
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("project", $con);
$id = $_POST['id'];
$name = $_POST['tname'];
$day =$_POST['day']; 
$tenant = $_POST['user'];
$date = $_POST['date'];
$tstatus = $_POST['tstatus'];
$group = $_POST['group'];
	
mysql_query("insert into task (taskName,date,day,user_id_fk,group_user_id_fk,tstatus) 
values ('$name','$date','$day','$id','$tenant','$tstatus')");
header("location: hmtask.php?id=$group");
mysql_close($con);
?> 