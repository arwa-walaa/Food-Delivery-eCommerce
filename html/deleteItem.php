<?php
     session_start();
    include 'Connect.php';
    if(isset($_GET['deleteID'])){
    $Id=$_GET['deleteID'];
    $email=$_SESSION['Email'];
    
    
    $sql="delete from `order` where `Product_ID`='$Id'  AND `Email` = '$email'";
    
    $query=mysqli_query($conn,$sql);
    
 if($query){
   

    // echo "Deleted Successfull";
    header('location:Card.php');
    echo
    "
    <script> alert('Data deleted Successfully'); </script>
    ";
    
} else{
    die(mysqli_error($db));
}
 }
?>