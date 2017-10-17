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
	$id1=$_GET[id];
	$result1=mysql_query("select * from group_users where group_id_fk='$id1'");
	$b=mysql_fetch_assoc($result1);
	$cok=$b['group_id_fk'];
		setcookie( "b",$cok,time()+3600);

	
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
                    <li class="active">
                        <a href="group.php?id=<?php echo $b['group_id_fk']?>"><i class="fa fa-fw fa-home"></i> Home</a>
                    </li>
					<li>
                        <a href="groupmember.php?id=<?php echo $b['group_id_fk'];?>"><i class="fa fa-fw fa-table"></i> Group Member</a>
                    </li>
                    <li>
                        <a href="gannouncement.php?id=<?php echo $b['group_id_fk'];?>"><i class="fa fa-fw fa-comment-o"></i> Announcement</a>
                    </li>
                    <li>
                        <a href="ownerviewpayment.php?id=<?php echo $b['group_id_fk'];?>"><i class="fa fa-fw fa-edit"></i> Payment history</a>
                    </li>
					<li>
                        <a href="hmlist.php?id=<?php echo $b['group_id_fk'];?>"><i class="fa fa-fw fa-edit"></i> Manage HouseManager </a>
                    </li>
					<li>
                        <a href="task.php?id=<?php echo $b['group_id_fk'];?>"><i class="fa fa-fw fa-edit"></i> Manage Household chores </a>
                    </li>
					<li>
						<a href="grouphomepage.php?id=<?php echo $b['group_id_fk'];?>"><i class="fa fa-fw fa-angle-left"></i> Back to group table</a>
					</li>


                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hi <?php echo $row["userEmail"];?> welcome back! <small>Group</small>
							<?php echo $b['group_id_fk'];?>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Announcement 
                            </li>
                        </ol>
                    </div>
                </div>

               
                   <div class="col-lg-3 col-md-6">
					
                  
                </div>

                
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-dashboard fa-fw"></i>Announcement Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                     <table class="table">
<thead>
<tr>

<th>Date</th>
<th>Name</th>
<th>Description</th>

</tr>
</thead>
<tbody>
<?php

$info1=mysql_query("select * from groups as g inner join announce as a on a.group_id_fk = g.group_id where a.group_id_fk='$b[group_id_fk]' and a.user_id_fk='$row[userId]' order by a.date DESC");

while($row2 = mysql_fetch_array($info1))
{
echo '<tr>';
echo "<td>" . $row2['date'] . "</td>";
echo "<td>" . $row2['annoName'] . "</td>";
echo "<td>" . $row2['annodes'] . "</td>";

echo "</tr>";
}?>
</tbody>
</table>
                                </div>
                                <div class="text-right">
                                    <a href="gannouncement.php?id=<?php echo $b['group_id_fk'];?>">View All announcement <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
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