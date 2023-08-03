
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forget_Password</title>

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
            width: 400px;
            height: 250px;
            margin-left: 35%;
            padding: 20px;
            border-radius: 20px;
            position: absolute;
            box-shadow: 15px 15px 33px #245258,
                16px 16px 20px #245258;
            z-index: 1;
            margin-top: 15%;
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
            width:99%;
            border-radius:5px;
        }
       
    </style>
</head>

<body>
    <div class="form">


        <form action="forget.php"  autocomplete="off" class="was-validated" method="post">
        <?php
             if(isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']?></p>
            <?php }?>
            <div class="form-group">
                <label for="uname">Email</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter Your Email" 
                name="uEmail" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            
            <button type="submit" class="btn btn-primary" value="verify" >Verify</button>
                
        </form>
    </div>
 </body>
 <?php 
session_start(); 
include "connect.php";
if (isset($_POST['uEmail']) )
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uEmail = validate($_POST['uEmail']);
    $sql="SELECT * from user where Email='$uEmail' ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)===1)
    {
        $row=mysqli_fetch_assoc($result);
         $username= $row['User_Name'];
         $password=$row['Password'];
         $email=$row['Email'];
         $to = $email;
         $subject = "Reset Password 'tasty'";
         
         $message = "username is $username \n";
         $message .= "password is $password";
         
         $header = "From:tasty5377@gmail.com \r\n";
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            
            header("Location:log_in.php");
             exit();
         }
         else {
            header("Location:forget.php?error= Can`t Send email,please try again ");
             exit();
         }
    }
    else
    {
      
        
            header("Location:forget.php?error= Incorrect Email ");
             exit();
        
       
    }
}
?>
 </html>

