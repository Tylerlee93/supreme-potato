<?php
session_start();

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("project", $con);
$restid = $_POST['userid'];
$restname=$_POST['name'];
$address=$_POST['contact'];

mysql_query("UPDATE users SET userName='$restname', contact='$address'  WHERE userId='$restid'");
header("location: userprofile.php");
mysql_close($con);
?> 