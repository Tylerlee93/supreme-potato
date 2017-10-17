<?php
error_reporting(-1);
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("project", $con);
$id=$_POST['groupuserid'];
$gname = $_POST['groupname'];
$desc = $_POST['groupdesc'];
$userid = $_POST['userid'];	
mysql_query("UPDATE group_users SET role='0' WHERE group_user_id='$id'");
$c = $_COOKIE['b'];
header("location: hmlist.php?id=$c");
mysql_close($con);
?> 