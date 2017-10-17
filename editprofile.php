
<script type="text/javascript">
function validateForm()
{
var a=document.forms["editres"]["name"].value;
if (a==null || a=="")
  {
  alert("Pls. Enter the product name");
  return false;
  }
var a=document.forms["editres"]["type"].value;
if (a==null || a=="")
  {
  alert("Pls. Enter the product type");
  return false;
  }
var b=document.forms["editres"]["price"].value;
if (b==null || b=="")
  {
  alert("Pls. Enter the product price");
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
				  if (isset($_GET['id']))
	{
	
	echo '<form action="editprofileexec.php" method="post" name="editres" onsubmit="return validateForm()">';
	
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
			$result = mysql_query("SELECT * FROM users WHERE userId=$id");
if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
			
			while($row = mysql_fetch_array($result))
			{
  			
			echo '<input type="hidden" name="userid" value="'. $row['userId'] .'">'; 
			echo '<br>'; 
  			echo'Name: '.'<input type="text" name="name" value="'. $row['userName'] .'">'; 
			   echo '<br>';
			  
			  			echo '<input type="hidden" name="email" value="'. $row['userEmail'] .'">'; 
				echo '<br>';

			  echo'Contact: '.'<input type="text" name="contact" value="'. $row['contact'] .'">'; 
			   							echo '<br>';

						echo '<input type="hidden" name="role" value="'. $row['role'] .'">'; 

			 
				echo '<br>';
			  echo '<input name="" type="submit" value="Save" />';
  			}
	echo '</form>';
			}
			?>
			
			   
