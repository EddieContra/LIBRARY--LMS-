<?php
session_start();

if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $Description=$_POST['Description'];
    $RegNo=$_SESSION['RegNo'];

$sql1="insert into library.recommendations (Book_Name,Description,RegNo) values ('$title','$Description','$RegNo')"; 

echo $RegNo;

/*
if($conn->query($sql1) === TRUE){


echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}*/
    
}
?> 
