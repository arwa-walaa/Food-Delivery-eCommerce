<?php 
include 'Connect.php';

    $email = $_GET['email'];

    $query = "UPDATE `user` SET `activated` = '1' WHERE `Email` = '$email'";
   
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Loged_out</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        
        body
        {
            background-color: #daecf0;
        }
        .form {
            width: 500px;
            height:100px;
            margin-left: 35%;
            padding: 15px;
            border-radius: 20px;
            position: absolute;
            box-shadow: 15px 15px 33px #245258,
                16px 16px 20px #245258;
            z-index: 1;
            margin-top: 19%;
            background-color: white;
            text-align:center;
            color:red;
            font-weight:bold;
        }
        a
        {
            color:black;
        }

    </style>

</head>
<body>
<div class="form">
    <div class="form-group">
    <h1> Account Activated </h1>
    click <a href="log_in.php">here</a> to log in
    </div>
</div>
    
</body>
</html>