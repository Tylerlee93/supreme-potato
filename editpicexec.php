<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("project") or die(mysql_error());





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
			$id=$_POST['firstname'];
			
			if(!$update=mysql_query("UPDATE payment SET image ='$location' WHERE pay_id='$id'")) {
			
				echo mysql_error();
				
				
			}
			else{
			$group = $_COOKIE['b'];
			header("location: ownerviewpayment.php?id=$group");
			exit();
			}
			}
	}


?>