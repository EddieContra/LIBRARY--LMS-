<?php
require('dbconn.php');

if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$query=mysqli_query($conn,"DELETE from user where RegNo='$rowid'");
if($query){
echo "<script>alert('librarian successfully deleted');</script>";
echo "<script>window.location.href='librarian.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";
    }

}


?>

<?php 
if ($_SESSION['RegNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IAA LMS</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">IAA LMS </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/iaa.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="librarian.php"><i class="menu-icon icon-user"></i>Manage Staffs</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage Students </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book Recommendations </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->

                    <div class="span9">
                        <form class="form-horizontal row-fluid" action="librarian.php" method="GET">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Search:</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Enter Staff username" class="span8" required>
                                                <button type="submit" name="submit"class="btn">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select * from library.user where (Type='$s' or Name like '%$s%') and Type<>('student')";
                                        }
                                    else
                                        $sql="select * from library.user where Type<>('student')";

                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>username</th>
                                      <th>Email id</th>                                      
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {

                                $email=$row['EmailId'];
                                $Name=$row['Name'];
                                $RegNo=$row['RegNo'];
                            ?>
                                    <tr>
                                      <td><?php echo $Name ?></td>
                                      <td><?php echo $RegNo ?></td>
                                      <td><?php echo $email ?></td>                                      
                                        <td>
                                        <center>
                                            <a href="staffdetails.php?id=<?php echo $RegNo; ?>" class="btn btn-success">Details</a>
                                            <a href="librarian.php?delid=<?php echo $row['RegNo']; ?>" class="btn btn-danger">Remove</a>
                                      </center>
                                        </td>
                                    </tr>
                            <?php }} ?>
                                  </tbody>
                                </table>
                                <center>
                                <a href="addlibrarian.php" class="btn btn-primary" style="margin-top:25px; padding: 10px 50px;" >Add Librarian</a>
                            </center>
                            </div>
                    <!--/.span9-->
                </div>

                
                                
                                         


            </div>
            <!--/.container-->
        </div>
<center><div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 Iaa Library Management System </b>All rights reserved.
            </div>
        </div></center>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>