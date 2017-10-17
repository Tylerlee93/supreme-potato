<?php
				  if (isset($_GET['id']))
	{
	$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("project", $con);
		
		$id=$_GET['id'];
		$result = mysql_query("SELECT * FROM payment WHERE pay_id = $id");

while($row = mysql_fetch_array($result))
  {
  echo "<img width=200 height=180 alt='Unable to View' src='" . $row["image"] . "'>";
  }
	echo '<form action="hmeditpicexec.php" method="post" enctype="multipart/form-data">';
	
	//echo "<img width=200 height=180 alt='Unable to View' src='" . $row1["image"] . "'>";
	echo '<br>';
			echo '<input type="hidden" name="firstname" value="'. $_GET['id'] .'">';
			echo 'Select Image';
			echo '<br>';
			echo '<input type="file" name="image">'.'<br>';
			echo '<input type="submit" value="Upload">';
	echo '</form>';
			}
			?>
			
