<?php 
session_start();
include "Connect.php";
if(isset($_POST['uname'])&&isset($_POST['upassword']))
{
    function validate($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;

    }
    $uname=validate($_POST['uname']);
    $upassword=validate($_POST['upassword']);


    if(empty($uname))
    {
        header("Location:log_in.php?error= User Name is required");
        exit();
    }
    else if (empty($upassword))
    {
        header("Location:log_in.php?error= Password is required");
        exit();
    }
    else
    {
        $sql="SELECT * from user where User_Name='$uname' AND Password='$upassword' ";

        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)===1)
        {
            $row=mysqli_fetch_assoc($result);

            if($row['User_Name']===$uname&&$row['Password']===$upassword)
            {
                if($row['status']==1)
                {
                    header("Location:log_in.php?error= You Can`t Log in, you are suspended");
                    exit();
                }
                if($row['activated']==0)
                {
                    header("Location:log_in.php?error= You have to Activate your account");
                    exit();
                }
                // echo "Loged in Successfully";
                $_SESSION['User_Name']=$row['User_Name'];
                $_SESSION['Password']=$row['Password'];
                $_SESSION['Email']=$row['Email'];
                $_SESSION['BirthDate']=$row['BirthDate'];
                $_SESSION['Address']=$row['Address'];
                $_SESSION['Gender']=$row['Gender'];
                $_SESSION['user_type']=$row['user_type'];
                if($row['user_type']==="user")
                {
                    header("location:homePage.php");
                     exit();
                }
                else
                {
                    header("location:admin.php");
                     exit();
                }
                
            }
            
           
        }
        
        else
        {
            header("Location:log_in.php?error= Incorrect password or User Name ");
             exit();
        }
    }
}
else
{
    header("Location:log_in.php");
    exit();
}