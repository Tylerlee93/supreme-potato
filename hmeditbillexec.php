<?php
session_start();
error_reporting(-1);

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("project", $con);

			$type=$_POST['type'];
			$id=$_POST['id'];
			$amount=$_POST['amount'];
			$groupfk=$_POST['groupfk'];
			$desc=$_POST['desc'];
			$date=$_POST['date'];
			$group=$_COOKIE['b'];
			
	
mysql_query("update payment set pay_desc='$desc',pay_type='$type',pay_amount='$amount',date='$date' 
where pay_id='$id' and group_id_fk='$group'");
		
header("location: hmpayment.php?id=$group");
mysql_close($con);
	
	
?> 