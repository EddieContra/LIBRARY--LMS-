<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$RegNo=$_GET['id2'];

$sql="select Category from library.user where RegNo='$RegNo'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$category=$row['Category'];



if($category == 'stu')
{$sql1="update library.record set Due_Date=date_add(Due_Date,interval 7 day),Renewals_left=0 where BookId='$bookid' and RegNo='$RegNo'";
 
if($conn->query($sql1) === TRUE)
{$sql3="delete from library.renew where BookId='$bookid' and RegNo='$RegNo'";
 $result=$conn->query($sql3);
 
 $sql5="insert into library.message (RegNo,Msg,Date,Time) values ('$RegNo','Your request for renewal of BookId: $bookid  has been accepted',curdate(),curtime())";
 $result=$conn->query($sql5);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=renew_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=renew_requests.php", true, 303);

}
}
else
{$sql2="update library.record set Due_Date=date_add(Due_Date,interval 14 day),Renewals_left=0 where BookId='$bookid' and RegNo='$RegNo'";

if($conn->query($sql2) === TRUE)
{$sql4="delete from library.renew where BookId='$bookid' and RegNo='$RegNo'";
 $result=$conn->query($sql4);
 $sql6="insert into library.message (RegNo,Msg,Date,Time) values ('$RegNo','Your request for renewal of BookId: $bookid has been accepted',curdate(),curtime())";
 $result=$conn->query($sql6);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=renew_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=renew_requests.php", true, 303);

}
}



?>