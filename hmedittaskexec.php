<?php
error_reporting(-1);
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("project", $con);
$id = $_POST['taskId'];
$name = $_POST['tname'];
$day =$_POST['day']; 
$tenant = $_POST['user'];
$date = $_POST['date'];
$tstatus = $_POST['tstatus'];
$group = $_POST['group'];
	
mysql_query("update task set taskName='$name',day='$day',date='$date',tstatus='$tstatus',group_user_id_fk='$tenant' where taskId='$id'");
header("location: hmtask.php?id=$group");
mysql_close($con);
?> 