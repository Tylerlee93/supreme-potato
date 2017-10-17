<?php
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("project", $con);
$id=$_POST['userid'];
 $gid = $_POST['groupid'];


mysql_query("insert into group_users(user_id_fk,group_id_fk,status,role) VALUES ('$id','$gid','1','0')");
header("location: groupresult.php");
mysql_close($con);
	
?>