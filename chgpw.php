 <?php require_once("dbconnect.php");

 
$cus_id=$_SESSION["userId"];
$result = mysql_query("select * from users where userId = '$cus_id'");
$row=mysql_fetch_assoc($result);
$old_password = $_POST['oldpw'];
$new_password = $_POST['newpw'];
	if(isset($_POST['pw']))
	{
		$pw=$_POST['pw'];
		if($pw == $row['pwd'])
			echo 1;
		else
			echo 0;
	}
	if(isset($_POST['npw']))
	{
		$new = $_POST['npw'];
		$query = mysql_query("update users set userPass='$new' where userId='$cus_id'");
		if($query)
			echo 0;
		else
			echo 1;
	}
?>