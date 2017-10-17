<?php
				  if (isset($_POST['yes']))
	{
			$con = mysql_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("project", $con);
			$messages_id = $_POST['groupid'];
			
			mysql_query("DELETE FROM group_users WHERE group_user_id='$messages_id'");
			header("location: groupresult.php");
			exit();
			
			mysql_close($con);
			}
			 if (isset($_POST['no']))
	{
			$group = $_POST['group'];
			header("location: hmgrouplist.php?id=$group");
			exit();
		
			}
			?>