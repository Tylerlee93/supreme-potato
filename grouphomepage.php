<?php

 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 if($_SESSION['user']=="")
	{
		header("Location:index.php");
	}
 // if session is not set this will redirect to login page
 $id=$_SESSION["user"];
	$result=mysql_query("select * from users where userEmail='$id'");
	$row=mysql_fetch_assoc($result);
 
 
 if(isset($_POST["createbtn"]))
	{
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		$desc = trim($_POST['desc']);
		$desc = strip_tags($desc);
		$desc = htmlspecialchars($desc);
		$a = trim($_POST['userfk']);
		$a = strip_tags($a);
		$a = htmlspecialchars($a);
		
		
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter group name.";
			} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleast 3 characters.";
			} 
			else{
				$query = "SELECT group_name FROM groups WHERE group_name='$name'";
				$result1 = mysql_query($query);
				$count = mysql_num_rows($result1);
			if($count!=0){
				$error = true;
				$nameError = "Group exist";
				}
			}
			
			
			if (empty($desc)) {
			$error = true;
			$descError = "Please enter group description.";
			} else if (strlen($desc) < 10) {
			$error = true;
			$descError = "description must have atleast 10 characters.";
			} 
		if( !$error ) {
		
		$query = "INSERT INTO groups(group_name,group_desc,user_id_fk) VALUES('$name','$desc','$a')";
		$res = mysql_query($query);	
		
			if ($res) {
			$errTyp = "success";
			$errMSG = "Group successfully created";
			unset($name);
			unset($desc);
			} 
			else {
			$errTyp = "danger";
			$errMSG = "Something went wrong, try again later..."; 
			}
		}
	}	
?>

<!DOCTYPE html>	
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $row["userEmail"];?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 
  
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
 
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })

  </script>

  
  <style type="text/css">
    table {
      border-collapse: collapse;
    }
    th, td {
      padding: 5px 10px;
      border: 1px solid #999;
    }
    th {
      background-color: #eee;
    }
    th[data-sort]{
      cursor:pointer;
    }
    tr.awesome{
      color: red;
    }
  </style>
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
                                        <h5 class="media-heading"><strong>Owner</strong>
                                        </h5>
                                        
                                    </div>
                                </div>
                            </a>
                        </li>
                       
                       
                </li>
                    </ul>
              
                
                <li class="dropdown">
                        <li>
                            <a href="userprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>

                        <li>
                            <a href="logout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="ownerhomepage.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
					<li  class="active">
                        <a href="grouphomepage.php"><i class="fa fa-fw fa-table"></i> Group Information</a>
                    </li>
                    <li>
                        <a href="announcement.php"><i class="fa fa-fw fa-table"></i> Announcement</a>
                    </li>
                    <li>
                        <a href="ownerpayment.php"><i class="fa fa-fw fa-edit"></i> Payment History</a>
                    </li>


                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hi <?php echo $row["userEmail"];?> welcome back! <small>Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-group"></i> Group
                            </li>
							
                        </ol>
                    </div>
                </div>

               
    
					<div class="container">
						<div class="col-md-12">
						
			

<table>
<thead>
<tr>
<th >User id</th>
<th >group id</th>
<th >group name</th>
<th >group description</th>
<th >members</th>
<th>direct</th>
<th>action</th>
</tr>
</thead>
<tbody>
<?php
$disp = mysql_query("SELECT * FROM groups where user_id_fk = '$row[userId]'");
while($row1 = mysql_fetch_array($disp))
{
echo '<tr>';
echo "<td>" . $row1['user_id_fk'] . "</td>";
echo "<td>" . $row1['group_id'] . "</td>";
echo "<td>" . $row1['group_name'] . "</td>";
echo "<td>" . $row1['group_desc'] . "</td>";
$disp1 = mysql_query("select group_user_id from group_users as gu 
							inner join groups as g on g.group_id = gu.group_id_fk 
								where g.user_id_fk = '$row[userId]' and gu.status='2' and gu.group_id_fk='$row1[group_id]'");

echo "<td>" . $count=mysql_num_rows($disp1) . "</td>";
echo '<td>';
echo'<a href=group.php?id='.$row1['group_id'].'>'."go to group page".'</a>';
echo '</td>';
echo '<td>';

echo'<a rel="facebox" href=editgroup.php?id=' . $row1['group_id'] . '>' . '<img src="picture/editicon.png"/>' . '</a>';
echo'<a rel="facebox" href=deletegroupexec.php?id=' . $row1['group_id'] . '>' . '<img src="picture/deleteicon.png"/>' . '</a>';
echo '</td>';
echo "</tr>";
}?>
</tbody>
</table>

						

						<script>function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}</script>
	
 <form name="editfrm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"" method="post">
  	<div id="welcomeDiv"  style="display:none; background-color:lightblue;" class="answer_list" >
    <p><span style="font-weight:bold">Group Name&emsp;:</span><input require="yes"  placeholder="group name" type="text"   name="name"/></p>
    <p><span style="font-weight:bold">Description&nbsp;:</span><input placeholder="group description" type="text" name="desc" />
	    <p><span style="font-weight:bold">owner&nbsp;:</span><input value="<?php echo $row["userId"];?>" type="text"  name="userfk" readonly />
		
    <input type="submit" name="createbtn" value="create" class="btn btn-danger" /></p> 
	
    </div><span class="text-danger"><?php echo $nameError; ?></span>
	<span class="text-danger"><?php echo $descError; ?></span><?php
   if ( isset($errMSG) ) {
    
    ?>
	<div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
   ?> 
	<input type="button" name="answer" value="Add" onclick="showDiv()" class="btn btn-danger" />
	</div> 
    </form>

						
					</div>
				</div>

                </div>
               
            </div>

        

  
 
    

</body>

</html>

<?php ob_end_flush(); ?>