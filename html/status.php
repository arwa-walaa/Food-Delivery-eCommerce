<?php
// include('connection.php');
$Email=$_GET['Email'];
$status=$_GET['status'];

$db= mysqli_connect("localhost","root","","tasty_db");

$q = "UPDATE `user` set status='$status' where Email='$Email'";

mysqli_query($db,$q);

header('location:admin.php');

?>