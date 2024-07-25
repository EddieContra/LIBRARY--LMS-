<?php
require('dbconn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="../css/styles1.css">
</head>
<body>
	<div>
	<h1 style="text-align: center;">IAA LIBRARY MANAGEMENT SYSTEM</h1>
</div><br><br>
	<div class="loginbox">
		<img src="../image/iaa.png" class="icon">
		<h2>Sign In</h2>
		<form action="admin.php" method="post">
			<p style="text-align: left;">Username</p>
			<input type="username" name="RegNo" placeholder="Enter Username" required="">
			<p style="text-align: left;">Password</p>
			<input type="password" name="Password" placeholder="Enter Password" required=""><br><br>
			<input type="submit" name="signin" value="Sign In">

		</form>
		
	</div>
		<center><footer style="margin-top: 41%;color: #fff;">
                <b class="copyright">&copy; 2023 Iaa Library Management System </b>All rights reserved.
        </footer></center>




<?php
if(isset($_POST['signin']))
{
	$u=$_POST['RegNo'];
 	$p=$_POST['Password'];

 $sql="select * from library.user where RegNo='$u'";

$result = $conn->query($sql);
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {
  //echo "Login Successful";
   $_SESSION['RegNo']=$u;
   
  if($y=='Admin')
   header('location:admin/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect user name or Password')</script>";
}
}

?>
</body>
</html>