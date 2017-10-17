
<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 require_once 'lib/phpmailer/PHPMailerAutoload.php';
 
 
 
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location:index.php");
  exit;
 }
 
 $error = false;
 session_regenerate_id();
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
 
  // if there's no error, continue to login
 
  
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Login & Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">

 <div id="login-form">
    
     <div class="col-md-12">
        
         <div class="form-group">
             <h2 class="">Forget Password?</h2>
            </div>
        
         <div class="form-group">
             <hr />
            </div>
            
            <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-danger">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?>
    		<div id="forgotbox-text">Please send us your email and we'll send you your password.</div>
			<div style="color:red;">Invalid Email</div>
                    <form method="post" action="sendemail.php">

            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="text" name="email" class="form-control" placeholder="Your Email" maxlength="40" />
                </div>
            </div>
            
         

            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-login">Submit</button>
            </div>
			</form>
		
		
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="index.php" class="back-login">Back to login</a>
	</div>
       
            <div class="form-group">
             <a href="registerTenant.php">Sign Up Here...</a>
            </div>
        
        </div>
   
    
    </div> 

</div>

</body>
</html>
<?php ob_end_flush(); ?>