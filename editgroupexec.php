<?php
error_reporting(-1);
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("project", $con);
$id=$_POST['groupid'];
$gname = $_POST['groupname'];
$desc = $_POST['groupdesc'];
$query = "SELECT group_name FROM groups WHERE group_name='$gname'";
				$result1 = mysql_query($query);
				$count = mysql_num_rows($result1);
				if($count!=0)
				{
					echo 'group exist';
					header("location: grouphomepage.php");
				}
				else{
mysql_query("UPDATE groups SET group_name='$gname',group_desc='$desc' WHERE group_id='$id'");
				header("location: grouphomepage.php");}
mysql_close($con);
?> 