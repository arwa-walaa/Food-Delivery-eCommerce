<?php

include "Connect.php";
$Email=$_SESSION['Email'];
$test=mysqli_query($conn,"SELECT * from user  where Email='$Email'");
$row=mysqli_fetch_assoc($test);



?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>HomePage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/homepage.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li><a class="nav-link active" href="#" style="font-family: 'Bilbo';font-size: 22px;">Tasty</a> </li>  
            <li><a class="nav-link " href="../homePage.php">Home</a> </li>
            <li><a class="nav-link active " href="category.php">Categories</a></li>
            
        <?php
            if($row['user_type']=='admin'){
               
        ?>
        <li><a class="nav-link " href="../admin.php">Admin Panel</a></li>
        <li><a class="nav-link " href="../dashBoard.php">Dashboard</a></li>
        <li><a class="nav-link " href="../Orders.php">Orders</a></li>
        <li><a class="nav-link " href="../AddProduct.php">Add Product</a></li>
        <?php }?>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
        <li><a class="nav-link " href="../Card.php"><i class="fa fa-shopping-cart"></i>Cart</a> </li>
        
                <li class="nav-item ">
                    <a class="nav-link " href="../Profile.php">
                        <i class="fa fa-user"></i>
                        <?php echo $row['User_Name'];?>  
                    </a>
                </li>
                
            <li><a class="nav-link " href="../logout.php">Log out</a> </li>
            
            </li>
        </ul>
    </nav>
</body>
</html>



