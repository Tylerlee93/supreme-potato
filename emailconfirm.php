<?php
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("project", $con);
	   $email = $_GET['email'];
	   $code = $_GET['code'];
	   
	   $query = mysql_query("select * from users where userEmail='$email'");
	   $row = mysql_fetch_assoc($query);
	   
		$db_code = $row['confirmcode'];
		   
	   
	   if($code == $db_code)
	   {
		   mysql_query("update users set confirmed = '1',confirmcode = '0' where userEmail='$email'");
		   echo '<script language="javascript">';
echo 'alert("account activated")';
echo '</script>';
		   header("location:index.php");
	   }
	   else
	   {
echo '<script type="text/javascript">alert("username and code not match!");</script>';
			}
	   
	   mysql_close($con);
	   ?>
