<?php
require('dbconn.php');

$id=$_GET['id'];

$RegNo=$_SESSION['RegNo'];

$sql="insert into library.renew (RegNo,BookId) values ('$RegNo','$id')";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Institute Librarian.')</script>";
header( "Refresh:0.01; url=current.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=current.php", true, 303);

}




?>