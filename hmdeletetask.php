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
			$group = $_POST['group'];
			mysql_query("DELETE FROM task WHERE taskId='$messages_id'");
			header("location: hmtask.php?id=$group");
			exit();
			
			mysql_close($con);
			}
			 if (isset($_POST['no']))
	{
			$group = $_POST['group'];
			header("location: hmtask.php?id=$group");
			exit();
		
			}
			?>