<?php
session_start();
// params to connect to a database
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbName = "library";

// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbName);
// Check connection
if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}
?>
