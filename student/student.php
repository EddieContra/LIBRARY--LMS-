<?php
require('dbconn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sign in form</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
 

</head>
<body>
	<div>
	<h1 style="text-align: center;">IAA LIBRARY MANAGEMENT SYSTEM</h1>
</div><br><br>
	<div class="loginbox">
		<img src="../image/icon.jpg" class="icon">
		<h2>Sign In</h2>
		<form action="student.php" method="post">
			<p style="text-align: left;">Username</p>
			<input type="username" name="RegNo" placeholder="Eg. BCS/0004/2021" required="">
			<p style="text-align: left;">Password</p>
			<input type="password" name="Password" placeholder="Enter Password" required=""><br><br>
			<input type="submit" name="signin" value="Sign In">
			<a href="#" >forgot password</a>
			<br>
			<br> 
			No account? <a href="signup.php"><b>Sign Up</b></a>
		</form>
	</div>
	<center><footer style="margin-top: 42%;color: #fff;">
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
   
  if($y=='Student')
   header('location:index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect username or Password')</script>";
}
}

?>
</body>
</html>


<!-- if($result){
	if($result && mysqli_num_rows($result)>0){
		$user_data = mysqli_fetch_assoc($result);
		if($user_data['Password']== $p && $user_data['RegNo'] == $u){
			$_SESSION['RegNo']=$u;
			header('location:index.php');
			die;
		}
		else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RegNo or Password')</script>";
}
	}
}-->