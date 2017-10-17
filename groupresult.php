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
	setcookie( "a", $row['userId'],time()+3600);

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
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                   
                                </div>
                            </a>
                        </li>
                        
                       
                        </li>
                    </ul>
                </li>
                
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
                    <li class="active">
                        <a href="grouplist.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>


                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hi <?php echo $row["userName"];?> <br>Join a group to proceed <small>Group List</small>
                        </h1>
                        
                    </div>
                </div>

			    <form method="post" action="">
			   <h3>Please insert group id</h3>
    <input type="text" name="search" placeholder="Search..." />
    <input type="submit" value="Search" />
</form>
                                    <table class="table">
<thead>
<tr>
<th data-sort="string">User id</th>
<th data-sort="int">group id</th>
<th data-sort="string">group name</th>
<th data-sort="string">group description</th>
<th>action</th>
</tr>
</thead>
<tbody>
<?php
$info=mysql_query("select group_user_id from group_users where user_id_fk='$row[userId]' and status='2' and role='0'");
$info1=mysql_query("select group_user_id from group_users where user_id_fk='$row[userId]' and status='2' and role='1'");

if(mysql_num_rows($info) >= 1)
{
	   Header("Location: tenanthomepage.php?id='$info'");

}
if(mysql_num_rows($info1) >= 1)
{
	   Header("Location: hmhomepage.php?id='$info'");

}
$search = $_POST['search'];
$disp = mysql_query("SELECT * FROM groups where group_id='$search'");



if(mysql_num_rows($disp) >= 1)
{
while($row1 = mysql_fetch_array($disp))
{
echo '<tr>';
echo "<td>" . $row1['user_id_fk'] . "</td>";
echo "<td>" . $row1['group_id'] . "</td>";
echo "<td>" . $row1['group_name'] . "</td>";
echo "<td>" . $row1['group_desc'] . "</td>";
echo "<td>";
$a=mysql_query("select status from group_users where user_id_fk='$row[userId]' and group_id_fk='$row1[group_id]' ");
if(mysql_num_rows($a) == 1){
		echo 'pending';	
		$group=mysql_query("select * from group_users where user_id_fk='$row[userId]' and group_id_fk='$row1[group_id]'");
		$row2=mysql_fetch_assoc($group);
		echo '<a rel="facebox" href=deletereqexec.php?id='.$row2['group_user_id'].'>'.' Cancel Request'.'</a>';
}
else{	
echo '<a rel="facebox" href=joingroup.php?id='.$row1['group_id'].'>'.'join'.'</a>';
}
echo '</td>';
echo "</tr>";
}
}
else
{
	echo"no group meet this id";
}
?>
</tbody>

</table>
                                
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

        </div>

    </div>

    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>

<?php ob_end_flush(); ?>