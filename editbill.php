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
	
	echo '<form action="editbillexec.php" method="post" name="editadmin" onsubmit="return validateForm()">';
	
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
$result=mysql_query("select * from payment as p inner join groups as g on p.group_id_fk = g.group_id where p.pay_id='$id'");

			while($row = mysql_fetch_array($result))
  			{
				
			
			echo'<input type="hidden" class="ed" name="id" value="'. $id .'" readonly>';

			echo'Date: '.'<input type="text" class="ed" name="date" value="'. date("Y/m/d") .'" readonly>';
			echo'<input type="hidden" class="ed" name="group" value="'. $_COOKIE['b'] .'" readonly>';
			
			echo '<br>';
			echo'Description: '.'<input type="text" class="ed" name="desc" value="'. $row['pay_desc'] .'">';
			echo '<br>';
			echo'Amount: '.'<input type="text" class="ed" name="amount" value="'. $row['pay_amount'] .'">';
			echo '<br>';
			echo'Type: ' ;
			    echo "<select name='type'>";
					echo "<option value='utilities' selected='selected'>utilities</option>";
					echo "<option value='electricity'>electricity</option>";
					echo "<option value='water'>water</option>";
					echo "<option value='internet'>internet</option>";
					echo "<option value='rental'>rental</option>";
				echo'</select>';
				echo '<br>';
			
			  echo '<input name="" type="submit" value="Save" />';
  			}
	echo '</form>';
			}
			?>
			
			
