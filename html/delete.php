<?php
$db= mysqli_connect("localhost","root","","tasty_db");
 if(isset($_GET['deleteID'])){
    $Id=$_GET['deleteID'];
    $sql="delete from product where ID=$Id";
    
    $query=mysqli_query($db,$sql);
    
 if($query){
   

    // echo "Deleted Successfull";
    header('location:AddProduct.php');
    echo
    "
    <script> alert('Data deleted Successfully'); </script>
    ";
    
} else{
    die(mysqli_error($db));
}
 }


 ?> 