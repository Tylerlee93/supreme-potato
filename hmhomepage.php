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
$info=mysql_query("select * from group_users as g inner join groups as u on u.group_id = g.group_id_fk where g.status='2' and g.user_id_fk = '$row[userId]' and g.role='1'");
	$row1=mysql_fetch_assoc($info);

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
                                        <h5 class="media-heading"><strong></strong>
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
                        <a href="hmhomepage.php?id=<?php echo $row1['group_id'];?>"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
					<li>
                        <a href="hmgrouplist.php?id=<?php echo $row1['group_id'];?>"><i class="fa fa-fw fa-table"></i> Group Information</a>
                    </li>
                    <li>
                        <a href="hmtask.php?id=<?php echo $row1['group_id'];?>"><i class="fa fa-fw fa-tasks"></i> Tasks</a>
                    </li>
                    <li>
                        <a href="hmpayment.php?id=<?php echo $row1['group_id'];?>"><i class="fa fa-fw fa-money"></i> Payment History</a>
                    </li>
<li>
                        <a href="hmanno.php?id=<?php echo $row1['group_id'];?>"><i class="fa fa-fw fa-dashboard"></i> Announcement</a>
                    </li>

                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hi <?php echo $row["userEmail"];?> welcome back! <small>Group <?php echo $row1['group_id'];?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Announcement 
                            </li>
                        </ol>
                    </div>
                </div>

               
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php 
										
										$result2 = mysql_query("SELECT taskId FROM task as t inner join group_users as gu on t.group_user_id_fk = gu.group_user_id where gu.group_user_id='$row1[group_user_id]'");
										$row2 = mysql_num_rows($result2);
										echo " " . $row2 . "";

													?></div>
                                        <div>Task</div>
                                    </div>
                                </div>
                            </div>
                            <a href="hmtask.php?id=<?php echo $row1['group_id'];?>">
                                <div class="panel-footer">
                                    <span class="pull-left">View Task</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php 
										
										$result3 = mysql_query("SELECT pay_id FROM payment where group_id_fk='$row1[group_id]'");
										$row3 = mysql_num_rows($result3);
										echo " " . $row3 . "";

													?></div>
                                        <div>Payment</div>
                                    </div>
                                </div>
                            </div>
 <a href="hmpayment.php?id=<?php echo $row1['group_id'];?>">                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            
                        
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                           
                        </div>
                    </div>
                  
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Announcement</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
<thead>
<tr>
<th>Date</th>
<th>Name</th>
<th>Description</th>
<th>Post by</th>
</tr>
</thead>
<tbody>
<?php

$info1=mysql_query("select * from groups as g 
						inner join announce as a on a.group_id_fk = g.group_id 
							inner join users as u on u.userId = a.user_id_fk
								where a.group_id_fk='$row1[group_id]' order by a.date DESC");

while($row4 = mysql_fetch_array($info1))
{
echo '<tr>';
echo "<td>" . $row4['date'] . "</td>";
echo "<td>" . $row4['annoName'] . "</td>";
echo "<td>" . $row4['annodes'] . "</td>";
echo "<td>" . $row4['userName'] . "</td>";


echo "</tr>";
}?>
</tbody>
</table>
                                </div>
                                <div class="text-right">
                                     <a href="hmanno.php?id=<?php echo $row1['group_id'];?>">View All Announcement <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
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