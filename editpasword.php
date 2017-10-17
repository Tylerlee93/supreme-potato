<?php 
 require_once 'dbconnect.php';
ob_start();
session_start();


if($_SESSION['user']=="")
{
	header("Location:userprofile.php");
}
	$id1=$_SESSION['user'];
	$result1=mysql_query("select * from users where userEmail='$id1'");
	$row1=mysql_fetch_assoc($result1);

if(isset($_POST['re_password']))
		{
		$old_pass=$_POST['old_pass'];
		$new_pass=$_POST['new_pass'];
		$re_pass=$_POST['re_pass'];
		$chg_pwd=mysql_query("select * from users where userId='$row1[userId]'");
		$chg_pwd1=mysql_fetch_assoc($chg_pwd);
		$data_pwd=$chg_pwd1['userPass'];
		if($data_pwd==$old_pass){
		if($new_pass==$re_pass){
			$update_pwd=mysql_query("update users set userPass='$new_pass' where userId='$row1[userId]'");
			echo "<script>alert('Update Sucessfully'); window.location='userprofile.php'</script>";
		}
		else{
			echo "<script>alert('Your new and Retype Password is not match'); window.location='editpasword.php'</script>";
		}
		}
		else
		{
		echo "<script>alert('Your old password is wrong'); window.location='editpasword.php'</script>";
		}}
	?>
<!DOCTYPE html >
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="chgpw.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>change password</title>
   <link rel="stylesheet" type="text/css" href="css/demo.css" />
</head>
<body>



<div id="wrapper">
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TogetheRER.com</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong></strong>
                                        </h5>
                                        
                                    </div>
                                </div>
                            </a>
                        </li>
                       
                        
                       
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
						<a href="logout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
				   <ul class="dropdown-menu">
                        <li>
                            <a href="userprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="logout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="userprofile.php"><i class="fa fa-fw fa-angle-left"></i> Home</a>
                    </li>
					


                </ul>
            </div>
        </nav>
		
 <div id="page-wrapper">

            <div class="container-fluid">

<form method="post">
		<dl>
			<dt>
				Old Password
			</dt>
				<dd>
					<input type="password" name="old_pass" placeholder="Old Password..." value="" required />
				</dd>
		</dl>
		<dl>
			<dt>
				New Password
			</dt>
				<dd>
					<input type="password" name="new_pass" placeholder="New Password..." value=""  required />
				</dd>
		</dl>
		<dl>
			<dt>
				Retype New Password
			</dt>
				<dd>
					<input type="password" name="re_pass" placeholder="Retype New Password..." value="" required />
				</dd>
		</dl>
 
		<p align="center">
			<input type="submit" class="btn" value="Reset Password" name="re_password" />
		</p>
	</form>
</div>     

</body>
</html>


<?php ob_flush(); ?>
