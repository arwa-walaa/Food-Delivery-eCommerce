<?php
session_start();
include '..\Connect.php';
$email=$_SESSION['Email'];
$id= $_SESSION['ID'];
$date=date('y-m-d h:i:s');
echo $id;
$sql2="INSERT INTO `order` (`Email`, `Product_ID`, `Order_Date`) VALUES ('$email', '$id', '$date')";

mysqli_query($conn, $sql2);

header("Location:category.php");
exit();
?>