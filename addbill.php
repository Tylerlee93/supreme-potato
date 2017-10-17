<script type="text/javascript">
function validateForm()
{
if (document.forms.editadmin.desc.value.length < 5) { 
alert('description should be more than 5 characters'); 
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
	
	
	echo ' <form action = "addbillexec.php" method = "POST" enctype = "multipart/form-data">';
	
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
			
			echo'<input type="hidden" class="ed" name="id" value="'. $id .'" readonly>';

			echo'Date: '.'<input type="text" class="ed" name="date" value="'. date("Y/m/d") .'" readonly>';
			echo'<input type="hidden" class="ed" name="group" value="'. $_COOKIE['b'] .'" readonly>';
			
			echo '<br>';
			echo'Description: '.'<input type="text" class="ed" name="desc">';
			echo '<br>';
			echo'Amount: '.'<input type="text" class="ed" name="amount">';
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
			echo'Image: '.'<input type="file" class="ed" name="image">';
			echo '<br>';
			   
				
			

			  
			  echo '<input name="" type="submit" value="Save" />'; 
  			
	echo '</form>';
			}
			?>
			
			
