<?php
session_start();
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("project", $con);

	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);
			
			$location="images/" . $_FILES["image"]["name"];
			$type=$_POST['type'];
			$id=$_POST['id'];
			$amount=$_POST['amount'];
			$desc=$_POST['desc'];
			$date=$_POST['date'];
			$group=$_COOKIE['b'];
			
			mysql_query("INSERT INTO payment (group_id_fk,pay_amount,pay_type,pay_desc,user_id_fk,image,date)VALUES
('$group','$amount','$type','$desc','$id','$location','$date')");
			
			
header("location: hmpayment.php?id=$group");
			mysql_close($con);

			
			}
	}


?>
