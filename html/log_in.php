<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log_in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../Web_project/Log_in.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .form {
            width: 500px;
            height: 430px;
            margin-left: 35%;
            padding: 20px;
            border-radius: 20px;
            position: absolute;
            box-shadow: 15px 15px 33px #245258,
                16px 16px 20px #245258;
            z-index: 1;
            margin-top: 10%;
            background-color:white;
        }

        body {
            background-color: #daecf0;
        }

        .btn {
            margin-left: 80%;
            background-color: #2a6971;
            border: none;
        }

        .btn:hover {
            background-color: #3faab8;
        }
        .forget_pas:hover
        {
            color: #2a6971;
            text-decoration-line: none;
        }
        .forget_pas
        {
            color:black;
            
        }
        .error{
            background:#F2DEDE;
            color:#A94442;
            padding:10px;
            width:95%;
            border-radius:5px;
        }
    </style>
</head>

<body>
    <div class="form">


        <form action="loginLogic.php" class="was-validated" method="post">
            <?php
             if(isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']?></p>
            <?php }?>
            
            

            <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="upassword" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                     <a class="forget_pas" href="forget.php">Forget Password?</a>
                     <p>if you haven't account <a href="Sign_up.php">sign up</a></p>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Check this checkbox to continue.</div>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            
            
        </form>
    </div>
</body>

</html>