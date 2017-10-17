 require_once 'lib/phpmailer/PHPMailerAutoload.php';

   $m = new PHPMailer;
 
 $m->isSMTP();
 $m->SMTPAuth = true;
 $m->SMTPDebug = 2;
 
 $m->Host = 'smtp.gmail.com';
 $m->Username = 'yyywlee@gmail.com';
 $m->Password = 'asusk43u';
 $m->SMTPSecure = 'ssl';
 $m->Port = 465;
 
 $m->From = 'yyywlee@gmail.com';
 $m->FromName = 'Tyler';
 $m->addReplyTo('yyywlee@gmail.com','reply address');
 $m->addAddress($email);
  $m->Body = "
	Confirm your email
	Click the link below to verify your account
	localhost/project/emailconfirm.php?email=$email&code=$confirmcode
	";
	$m->send(); 
	  