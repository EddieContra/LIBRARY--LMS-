<?php

session_start();
session_destroy();
header("location:../staffs.php");
exit;
?>
