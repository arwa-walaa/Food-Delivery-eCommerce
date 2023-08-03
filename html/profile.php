
<?php

session_start();

$flag=null;
if(!isset($_SESSION['Email']))
{
    
    header("Location:homePage.php");
}
else
{
    include "LoginNavbar.php";
}

include 'Connect.php';
$Email=$_SESSION["Email"];
$test=mysqli_query($conn,"SELECT * from user  where Email='$Email'");
 $row=mysqli_fetch_assoc($test);
 $image='';
 if((isset($_POST['submit']))){
    
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $birthDat = $_POST['birthday'];
    // $image = $_POST['Profile'];

    $image = $_FILES['image'];
	$imagename = $_FILES['image']['name'];
	$imagetype = $_FILES['image']['type'];
	$image_tmp_name = $_FILES['image']['tmp_name'];
	$imagesize = $_FILES['image']['size'];
	$folder = "../image/".$imagename;
    error_reporting(E_ALL ^ E_WARNING);
    move_uploaded_file($image_tmp_name, $folder);


   
  $query = "UPDATE user SET User_Name = '$name',
                  Gender = '$gender', Address = '$address',BirthDate='$birthDat' ,Profile_Picture='$imagename'
                  WHERE Email = '$Email'";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                
                
             
        }  

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
 
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>

        function myFunction() {
            document.getElementById('myName').removeAttribute('readonly');
            
            document.getElementById('myAddress').removeAttribute('readonly');
            document.getElementById('field-upload').removeAttribute('disabled');
            
            document.getElementById('myGender').removeAttribute('readonly');
            document.getElementById('birth').removeAttribute('readonly');
        };

        function update() {
           
          <?php  $flag=1; ?> 
            alert("Update Successfull.");
           
            
        };
  </script>
    <style>
        body {
            background-color: #daecf0;
        }
        .navbar 
        {
            width: 100%;
            position: fixed;
            z-index: 1;
        
        }
        .container {
            background-color: white;
            height: 660px;
            border-radius: 20px;
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;
            z-index: 0;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #2a6971;
        }

        .profile-button {
            background: #2a6971;
            box-shadow: none;
            border: none;

        }

        #button1 {
            margin-left: 19%;
        }

        .profile-button:hover {
            background: #2d4145;

        }



        .profile-button:active {
            background: #2a6971;
            box-shadow: none
        }

        .back:hover {
            color: #2a6971;
            cursor: pointer
        }

        .labels {
            font-size: 14px;

            font-weight: bold;
        }

        h3 {
            color: #2a6971;
            font-weight: bold;
            float: right;
           
            
        }
        .order
        {
          float: right;
          margin-bottom:100%;
          margin-top: -85%;
          margin-right: -50%;   
          border-radius:15px;
          width:400px;
          height:412px;
          
         
        }
        

        
    </style>
</head>

<body>
  
    <div class="container">
        <form action="profile.php" method="post" enctype="multipart/form-data">  
        <div class="col-md-6 border-right ">
            <div class="p-3 py-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Profile Settings</h3>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Name</label><input id="myName" type="text" class="form-control"
                            placeholder="Your Name" value="<?php  echo  $row['User_Name']; ?>" name="name" readonly ><br></div>


                    <div class="col-md-12"><label class="labels">Email</label><input  id="myEmail" type="text" class="form-control"
                            placeholder="Your Email" value="<?php  echo  $row['Email']; ?>" name="email" readonly><br></div>
                   
                    <div class="col-md-12"><label class="labels">Address</label>
                    <input  id="myAddress" type="text" class="form-control"
                    placeholder="Your Address" value="<?php  echo $row['Address']; ?>" name="address" readonly>
                        <br>
                    </div>

                    <div class="col-md-12">
                       
                        <label class="labels">Gender</label><input  id="myGender" type="text" class="form-control"
                            placeholder="Your Gender" value="<?php  echo  $row['Gender']; ?>" name="gender" readonly><br>
                        
                    </div>

                    <div class="col-md-12">
                        <label class="labels" for="uname">Birthday</label>
                        <input id="birth"  type="date" class="form-control" id="birth" placeholder="Your birthday" 
                        value="<?php  echo  $row['BirthDate']; ?>" name="birthday" readonly
                            readonly>

                    </div>
                    
                    <!-- <div class="custom-file">
                    <br>
                   
               

                <label  style="margin-left:15px"for="img" id="Edit_Button" class="btn btn-primary profile-button">Choose Profile Picture</label>
                <input type="file" id="img" style="display:none">               
            </div>  -->
            
            <div class="col-md-12">
            <br>
                <label class="labels" for="uname">Profile Picture</label>
                <input style="margin-left:15px" type="file" class="custom-file__input" id="field-upload"  name="image"  disabled>
                <label class="custom-file__label" for="field-upload">
                <!-- <label  style="margin-left:10px;width:230px"for="img" id="Edit_Button" class="btn btn-primary profile-button">Choose Profile Picture</label>
                <input type="file" id="img" style="display:none">
                </label> -->
            </div> 

                </div>
                
                <button id="Edit_Button" class="btn btn-primary profile-button" type="button" onclick=" myFunction()" style="margin-top:10px">Edit Profile</button>
                <button class="btn btn-primary profile-button" type="submit" value="submit" name="submit" id="submit" onclick="update()" style="margin-top:10px">Save Profile</button>
               
            </div>
        </div>


        </form>
        <div class="col-md-8">

      <div class="p-3 py-5">
          <!--=============-->
       
          <!-- <img class="order" src="https://i.pinimg.com/564x/20/0d/72/200d72a18492cf3d7adac8a914ef3520.jpg"> -->
          <img class="order"  src="..\images\<?php  echo $row['Profile_picture']; ?>" name="Profile"  >
     
          <!-- <div class="custom-file">
                <input type="file" class="custom-file__input" id="field-upload"  name="image" required style="margin-left:42%; margin-bottom:40%">
                <label class="custom-file__label" for="field-upload">
                    <h6 style="color:black">Choose file</h6>
                </label>
            </div>  -->
        </div>
  </div>

          
    </div>

    
    </div>
</body>


</html>

