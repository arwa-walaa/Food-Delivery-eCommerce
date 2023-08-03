<?php
session_start();
if (isset($_SESSION['Email'])){
    include "LoginNavbar.php";
}
else{
    include "unloginNavbar.php";
}
  



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
    
    
    <div class="jumbotron" >
        <h1 style="font-family: 'Bilbo';font-size: 110px; text-align:center ;margin-top:10% ;font-weight:bold"> Tasty</h1>
        <p style="font-family: 'Bilbo';font-size: 50px; text-align:center">Fast and Tasty</p>
    </div>
    
    <div class="container-fluid bg-4 text-center"></div>
    <div style="margin-top:-15px"> <?php include "footer.php"?></div>
    <!-- <div class="container my-5"> -->
    <!-- Footer -->
    <!-- End of .container -->
    <!-- </div> -->
</body>

</html>

