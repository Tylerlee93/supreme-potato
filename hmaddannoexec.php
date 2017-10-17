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
$name = $_POST['name'];
$group =$_POST['group']; 
$desc = $_POST['desc'];
$date = $_POST['date'];
	
mysql_query("insert into announce (annodes,user_id_fk,date,annoName,group_id_fk) values ('$desc','$id','$date','$name','$group')");
header("location: hmanno.php?id=$group");
mysql_close($con);
?> 