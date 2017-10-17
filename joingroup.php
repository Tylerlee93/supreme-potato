<?php
 
 if (isset($_GET['id']))
	{
	
	echo '<form action="joingroupexec.php" method="post" name="editadmin" onsubmit="return validateForm()">';
	
	//echo "<img width=200 height=180 alt='Unable to View' src='" . $row1["image"] . "'>";
	echo '<br>';
	echo '<input type="hidden" name="firstname" value="'. $_GET['id'] .'">';
			$con = mysql_connect("localhost","root","");
			if (!$con)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			mysql_select_db("project", $con);
		
			$id = $_GET['id'];
			$result = mysql_query("SELECT * FROM groups WHERE group_id= '$id'");
		
			while($row = mysql_fetch_array($result))
  			{
				echo 'Group Id: '.'<input type="text" name="groupid" value="'. $row['group_id'] .'" readonly >'; 
				echo '<br>';
				echo'GroupName: '.'<input type="text" class="ed" name="groupname" value="'. $row['group_name'] .'" readonly>'; 
			   echo '<br>';
			  echo'description: '.'<input type="text" class="ed" name="groupdesc" value="'. $row['group_desc'] .'" readonly>';
			   echo '<br>';
			 echo'<input type="hidden" class="ed" name="userid" value="'. $_COOKIE['a']  .'" readonly>';

			  echo '<br>';
			  echo '<input name="savebtn" type="submit" value="join" />';
  			}
	echo '</form>';
			}
			?>

 
 