<?php
error_reporting(-1);
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("project", $con);
$id = $_POST['annoid'];
$name = $_POST['name'];
$group =$_POST['group']; 
$desc = $_POST['desc'];
$date = $_POST['date'];
	
mysql_query("update announce set annoName='$name',annodes='$desc' where annoId='$id' and group_id_fk='$group'");
header("location: gannouncement.php?id=$group");
mysql_close($con);
?> 