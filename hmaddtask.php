<script type="text/javascript">
function validateForm()
{
if (document.forms.editadmin.tname.value.length < 5) { 
alert('task name should be more than 5 characters'); 
return false;
} 
}
</script>
<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thick;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
</style>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
				  if (isset($_GET['id']))
	{
	
	echo '<form action="hmaddtaskexec.php" method="post" name="editadmin" onsubmit="return validateForm()">';
	
	//echo "<img width=200 height=180 alt='Unable to View' src='" . $row1["image"] . "'>";
	echo '<br>';
	echo '<input type="hidden" name="firstname" value="'. $_GET['id'] .'">';
			$con = mysql_connect("localhost","root","");
			if (!$con)
  			{
  			die('Could not connect: ' . mysql_error());
  			}
			mysql_select_db("project", $con);
		
			$id=$_GET['id'];
			
			
			$info=mysql_query("select * from group_users as g 
								inner join users as u on g.user_id_fk=u.userId where g.group_id_fk ='$_COOKIE[b]' and g.status ='2'");
			echo'<input type="hidden" class="ed" name="id" value="'. $id .'" readonly>';

			  echo'Chores: '.'<input type="text" class="ed" name="tname">';
			echo '<br>';
			 echo'Date: '.'<input type="text" class="ed" name="date" value="'. date("Y/m/d") .'" readonly>';
			  echo '<br>';
			  echo'Day: ' ;
			  echo "<select name='day'>";
					echo "<option value='monday' selected='selected'>Monday</option>";
					echo "<option value='tuesday'>Tuesday</option>";
					echo "<option value='wensday'>Wensday</option>";
					echo "<option value='thursday'>Thursday</option>";
					echo "<option value='friday'>Friday</option>";
				echo'</select>';
				
			  echo '<br>';
			   echo'Assigned to: ' ;
			  echo "<select name='user'>";
					while ($row1 = mysql_fetch_array($info)) {
					echo "<option value='" . $row1['group_user_id'] . "'>" . $row1['userName'] . "</option>";
					}				
					echo'</select>';
			   echo '<br>';
			  
			   echo'<input type="hidden" class="ed" name="group" value="'. $_COOKIE['b'] .'" readonly>';
			  echo '<br>';
			  
				echo'Status: ' ;
			  echo "<select name='tstatus'>";
					echo "<option value='undertaking' selected='selected'>undertaking</option>";
					echo "<option value='done'>done</option>";
					
				echo'</select>';

			  echo '<br>';
			  echo '<input name="" type="submit" value="Save" />'; 
  			
	echo '</form>';
			}
			?>
			
			
