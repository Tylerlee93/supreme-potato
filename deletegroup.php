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
			
			mysql_query("DELETE FROM groups WHERE group_id='$messages_id'");
			header("location: grouphomepage.php");
			exit();
			
			mysql_close($con);
			}
			 if (isset($_POST['no']))
	{
			
			header("location: grouphomepage.php");
			exit();
		
			}
			?>