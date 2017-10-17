<script type="text/javascript">
function validateForm()
{
if (document.forms.editadmin.group_name.value.length < 3) { 
alert('length of group name cannot be lesser than 3 characters'); 
return false;
} 

if (document.forms.editadmin.group_desc.value.length < 10) { 
alert('group description should be more than 10 characters'); 
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
	
	echo '<form action="editgroupexec.php" method="post" name="editadmin" onsubmit="return validateForm()">';
	
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
			$result = mysql_query("SELECT * FROM groups WHERE group_id= '$id'");

			while($row = mysql_fetch_array($result))
  			{
				echo '<input type="hidden" name="groupid" value="'. $row['group_id'] .'">'; 
  			echo'Group Name: '.'<input type="text" class="ed" name="groupname" value="'. $row['group_name'] .'">'; 
			   echo '<br>';
			  echo'description: '.'<input type="text" class="ed" name="groupdesc" value="'. $row['group_desc'] .'">';
			  echo '<br>';
			  echo '<input name="" type="submit" value="Save" />';
  			}
	echo '</form>';
			}
			?>
			
			
