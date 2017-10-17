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
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $row["userEmail"];?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                    <li>
                        <a href="ownerhomepage.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
					<li>
                        <a href="grouphomepage.php"><i class="fa fa-fw fa-table"></i> Group Information</a>
                    </li>
                    <li class="active">
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
                            Hi <?php echo $row["userName"];?> welcome back! <br><small>Announcement Overview</small>
                        </h1>
                    
                    </div>
                </div>

               
                   <div class="col-lg-4">
                        <div>
                            
                            <div class="panel-body">
                                <div>
							
                                    <table class="table table-bordered table-hover table-striped">
										
                                      
                                            <tr>
                                                <th>Announcement id</th>
                                                <th>Announcement Name</th>
                                                
												<th>description</th>
                                                <th>group id</th>
												<th>date</th>							
                                            </tr>
                                        
                                       <?php
$disp = mysql_query("SELECT * FROM announce where user_id_fk='$row[userId]'");
while($row1 = mysql_fetch_array($disp))
{
echo "<tr>";
echo "<td>" . $row1['annoId'] . "</td>";
echo "<td>" . $row1['annoName'] . "</td>";
echo "<td>" . $row1['annodes'] . "</td>";
echo "<td>" . $row1['group_id_fk'] . "</td>";
echo "<td>" . $row1['date'] . "</td>";



echo "</tr>";
}?>

                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
					<div class="container">
						
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
