<?php 
session_start(); 
include "connect.php";
$image='';

if (isset($_POST['uname']) && isset($_POST['password'])
 && isset($_POST['re_password'])) {

	function validate($data)
	{
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
    $uEmail = validate($_POST['uEmail']);
    $uAddress = validate($_POST['uAddress']);
    $uBirthDate = validate($_POST['uBirthDay']);
    $uGender = validate($_POST['gender']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);

	$image = $_FILES['image'];
	$imagename = $_FILES['image']['name'];
	$imagetype = $_FILES['image']['type'];
	$image_tmp_name = $_FILES['image']['tmp_name'];
	$imagesize = $_FILES['image']['size'];
	$folder = "../image/".$imagename;
	// error_reporting(E_ALL ^ E_WARNING);
    move_uploaded_file($image_tmp_name, $folder);

	$to = $uEmail;
		$subject = "Activate Tasty Account";
		
		$message = "click <a href=\"http://localhost/web_project/Web_project/html/accountActivated.php?email=".$uEmail."\">here</a> to activate your account";
		
		$header = "From:tasty5377@gmail.com \r\n";
		$retval = mail ($to,$subject,$message,$header);
		
		if( $retval == true ) {
		   
		   header("Location:log_in.php");
			
		}
		else {
		   header("Location:forget.php?error= Can`t Send email,please try again ");
		
		}
	
	
    $user_data = 'uname='. $uname. '&uEmail='. $uEmail. '&password='. $pass.'&uAddress='. $uAddress .'&uBirthDay='. $uBirthDate.'&gender='. $uGender ;
		// hashing the password
        // $pass = md5($pass);
	    $sql = "SELECT * FROM user WHERE `Email` ='$uEmail' ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) 
        {
			header("Location: sign_up.php?error=The Email is taken try another&$user_data");
	        exit();
		}
        else 
        {
           $sql2 ="INSERT into user(User_Name,Password,Email,BirthDate,Address,Gender,Profile_picture) values('$uname','$pass','$uEmail','$uBirthDate','$uAddress','$uGender','$imagename') ";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: sign_up.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: sign_up.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}

		
}else{
	header("Location: sign_up.php");
	exit();
}