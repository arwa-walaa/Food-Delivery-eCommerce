<?php
// include('connection.php');
$Email=$_GET['Email'];
$user_type=$_GET['user_type'];

$db= mysqli_connect("localhost","root","","tasty_db");

$q = "UPDATE `user` set user_type='admin' where Email='$Email'";

mysqli_query($db,$q);

header('location:admin.php');

?>