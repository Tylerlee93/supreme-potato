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
                      <li>
                        <a href="hmhomepage.php?id=<?php echo $row1['group_id'];?>"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
					<li >
                        <a href="hmgrouplist.php?id=<?php echo $row1['group_id'];?>"><i class="fa fa-fw fa-table"></i> Group Information</a>
                    </li>
                    <li>
                        <a href="hmtask.php?id=<?php echo $row1['group_id'];?>"><i class="fa fa-fw fa-tasks"></i> Tasks</a>
                    </li>
                    <li  class="active">
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
                            Payment <small>Group <?php echo $b['group_id_fk'];?></small>
                        </h1>
                       
                    </div>
                </div>

               
                   <div class="col-lg-3 col-md-6">
					
                </div>

                
                    <div class="col-lg-4">
					 <table class="table">
<thead>
<tr>
<th>Date</th>
<th>Description</th>
<th>type</th>
<th>Post by</th>
<th>Bill</th>
<th>Paid receipt</th>
<th>Amount</th>
<th>Action</th>
<th>Picture</th>
<th>Receipt</th>
</tr>
</thead>
<tbody>
<?php
$info=mysql_query("select * from payment as p 
						inner join groups as g on p.group_id_fk = g.group_id 
							inner join users as u on u.userId = p.user_id_fk	
								where g.group_id = $row1[group_id] order by date DESC");

while($row2 = mysql_fetch_array($info))
{
	
echo '<tr>';
echo "<td>" . $row2['date'] . "</td>";
echo "<td>" . $row2['pay_desc'] . "</td>";
echo "<td>" . $row2['pay_type'] . "</td>";
echo "<td>" . $row2['userName'] . "</td>";
echo "<td>" . '<img width=72 height=52 alt="Unable to View" src=' . $row2["image"] . '>' .  "</td>";
echo "<td>" . '<img width=72 height=52 alt="no record" src=' . $row2["imagetenant"] . '>' .  "</td>";

echo "<td>RM" . $row2['pay_amount'] . "</td>";
echo "<td>";
echo'<a rel="facebox" href=hmeditbill.php?id=' . $row2['pay_id'] . '>' . '<img src="picture/editicon.png"/>' . '</a>';
echo'<a rel="facebox" href=hmdeletebillexec.php?id=' . $row2['pay_id'] . '>' . '<img src="picture/deleteicon.png"/>' . '</a>';
echo "</td>";
echo "<td>";
echo'<a rel="facebox" href=hmeditpic.php?id=' . $row2['pay_id'] . '>edit bill</a>';
echo "</td>";
echo "<td>";
echo'<a rel="facebox" href=hmeditpic1.php?id=' . $row2['pay_id'] . '>edit receipt</a>';
echo "</td>";

echo "</tr>";
}?>
</tbody>
</table>
                     
<a rel="facebox" name="answer" value="Add" href="hmaddbill.php?id=<?php echo $row['userId'];?>" class="btn btn-danger" />Add</a>

                  
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