 <?php
require('dbconn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<h1 style="text-align: center;">IAA LIBRARY MANAGEMENT SYSTEM</h1>
	<div class="register">
		<h3>Sign Up</h3>
		<form action="signup.php" method="post">
			<input type="text" Name="RegNo" placeholder="Registration Number eg. BCS/0114/2020" required="">
			<input type="text" Name="Name" placeholder="Name" required>
			<input type="text" Name="EmailId" placeholder="Email" required>
			<input type="password" Name="Password" placeholder="Password" required>
			<input type="password" Name="cpassword" placeholder="Confirm Password" required>
			<input type="text" Name="PhoneNo" placeholder="Phone Number" required>
			<br>
			<br>
			<input type="submit" name="signup" value="Sign Up"><br>
			Already have an acoount? <a href="student.php" ><b>Sign In</b></a>
		</form>
	</div>



<?php

if(isset($_POST['signup']))
{
	$RegNo=$_POST['RegNo'];
	$Name=$_POST['Name'];
	$type='Student';
	$category='stu';
	$email=$_POST['EmailId'];
	$password=$_POST['Password'];
	$cpassword=$_POST['cpassword'];
	$phoneNo=$_POST['PhoneNo'];



	if($password !== $cpassword){
			echo "<script type='text/javascript'>alert('Password Do Not Match')</script>";
			exit();
	}
	
		//$hashedPass=password_hash($password, PASSWORD_DEFAULT);



	$sql="insert into library.user (RegNo,Name,Type,Category,EmailId,Password,PhoneNo) values ('$RegNo','$Name','$type','$category','$email','$password','$phoneNo')";



	if ($conn->query($sql) === TRUE) {
			echo "<script type='text/javascript'>alert('Registration Successful')</script>";

} 

 else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>
?>
</body>
</html>
