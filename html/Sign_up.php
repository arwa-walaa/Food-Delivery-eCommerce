<!DOCTYPE html>
<?php

session_start();

include("Connect.php");


if($_SERVER['REQUEST_METHOD']=="POST"){
    //something is posted
    $uname=$_POST['uname'];
    $uEmail=$_POST['uEmail'];
    $uAddress=$_POST['uAddress'];
    $uBirthDay=$_POST['uBirthDay'];
    $pswd=$_POST['pswd'];
    $gender=$_POST['gender'];
    if(!empty( $gender) ){
        //save to dataBase
        $query="insert into user(User_Name,Password,Email,BirthDate,Address,Gender) 
        values('$uname','$pswd','$uEmail','$uBirthDay','$uAddress','$gender') ";
        mysqli_query( $conn,$query);
        header("Location: homePage.php");
        die;
    }
    else{
        echo " enter you gender";
    }
}
    
?>
<html lang="en">

<head>
    <title>Sign_up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../Web_project/Log_in.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="/path/to/bootstrap-show-password.js"></script>
   
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .form {
            width: 1000px;
            height: 700px;
            margin-left: 15%;
            background-color: white;
            padding: 20px;
            border-radius: 20px;

            position: absolute;
            /* box-shadow: 35px 35px 53px #245258,
                -28px -28px 40px #245258; */
            z-index: 5;
            margin-top: 70px;
        }
        
        body {
            background-color: #daecf0;
            
        }

        .btn {
            margin-left: 25%;
            width: 500px;
            background-color: #fe4854;
            border: none;
        }

        .btn:hover {
            background-color: #3faab8;
        }

        .forget_pas:hover {
            color: #2a6971;
            text-decoration-line: none;
        }

        .forget_pas {
            color: black;

        }
        .navbar {
            width: 100%;
            position: fixed;
        }
        .error {
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
        }

        .success 
        {
        background: #D4EDDA;
        color: #40754C;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
        }
        .profile-button {
            background: #2a6971;
            box-shadow: none;
            border: none;

        }
        .profile-button:hover {
            background: #2d4145;

        }



        .profile-button:active {
            background: #2a6971;
            box-shadow: none
        }


    </style>
</head>

<body>
    
    <div class="form">
        <form action="signup_logic.php" method="POST" class="was-validated" enctype="multipart/form-data">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>
                <div class="row">
                    <div class="col">
                        <label for="uname">Name:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Your Name" name="uname"
                            required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col">
                        <label for="uname">Email:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Your Email" name="uEmail"
                            pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">email must be like example@gmail.com.</div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <label for="uname">Address:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Your Address" name="uAddress"
                            required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="col">
                        <label for="uname">Birthday:</label>
                        <input type="date" class="form-control" id="uname" placeholder="Your birthday" name="uBirthDay"
                            required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>


                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="password" name="password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <!-- <i class="far fa-eye" id="togglePassword" style="margin-left: 90%; cursor: pointer; margin-top: -100%;" ></i> -->
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">password must contain 8 or more characters that are of at least
                            one
                            number,
                            and one uppercase and lowercase letter</div>
                    </div>
                    <div class="col">
                        <label for="pwd">Confirm Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="password" name="re_password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <!-- <i class="far fa-eye" id="togglePassword" style="margin-left: 90%; cursor: pointer; margin-top: -100%;" ></i> -->
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">password must contain 8 or more characters that are of at least
                            one
                            number,
                            and one uppercase and lowercase letter</div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="uname">Gender:</label><br>


                        <input type="radio" name="gender" value="Female  " ><i class="fa fa-female"></i>Female

                        <input type="radio" name="gender" value="Male   " ><i class="fa fa-male"></i> Male<br>
                    </div>

                    <div class="col">
                        
                    
                        <div class="custom-file">
                        
                        <label for="uname">Profile Picture:</label><br>
                        <input type="file" class="custom-file__input" id="field-upload"  name="image" required>
                        <label class="custom-file__label" for="field-upload">
                        
                    </div> 

                    </div>
                </div>
            
               
                <button type="register" name="RegisterButton" class="btn btn-primary" style="margin-top:50px">Register</button>
                
                <p style="text-align:center;margin-top:20px">if you already have an account <a href="log_in.php">Log in</a></p>
                
            </form>
           
    </div>
</body>


</html>