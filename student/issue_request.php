<?php
require('dbconn.php');

$id=$_GET['id'];

$RegNo=$_SESSION['RegNo'];

$sql="insert into library.record (RegNo,BookId,Time) values ('$RegNo','$id', curtime())";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Institute Librarian.')</script>";
header( "Refresh:0.01; url=book.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=book.php", true, 303);

}




?>