
<?php     
    session_start();
   if(isset($_SESSION['Email'])&& $_SESSION['user_type']=='admin')  {
   
     // Create connection
     $conn= mysqli_connect("localhost","root","","tasty_db");
    //  $productQuery = "SELECT * FROM `product`";
    //  $product = mysqli_query($conn,$productQuery);
  
    $ID=$_GET['editid'];
    $test=mysqli_query($conn,"SELECT * from product where ID='$ID'");
    $row=mysqli_fetch_assoc($test);
     if(isset($_POST['submit_btn'])){
      
       $Product_Name=$_POST['Product_Name'];
       $category_name=$_POST['category_name'];
       $Price=$_POST['Price'];
       $Ingredience=$_POST['Ingredience'];
       $Product_image=$_POST['Product_image'];
       $Source=$_POST['Source'];
       $Nutritional_Facts=$_POST['Nutritional_Facts'];
     
     $sql = "update `product` set ID=$ID, Product_Name='$Product_Name',
     category_name='$category_name',Price=$Price,Ingredience='$Ingredience',
     Product_image='$Product_image',Source='$Source',
     Nutritional_Facts='$Nutritional_Facts' where ID=$ID";
     $product = mysqli_query($conn,$sql);
     
     if($product){
   

        // echo "Updated Successfull";
         header('location:AddProduct.php');
        // echo
        // "
        // <script> alert('Data deleted Successfully'); </script>
        // ";
        
    } else{
        die(mysqli_error($conn));
    } }
    
    $select = "SELECT * FROM `category`";
    $result3 = mysqli_query($conn,$select);
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

 <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li><a class="nav-link active" href="#" style="font-family: 'Bilbo';font-size: 22px;">Tasty</a> </li>
        <li><a class="nav-link " href="admin.php">Admin Panel</a></li>
        <li><a class="nav-link " href="dashBoard.php">Dashboard</a></li>
        <li><a class="nav-link active" href="Orders.php">Orders</a></li>
        <li><a class="nav-link " href="AddProduct.php">Add Product</a></li>
     
    </ul>
    <ul class="nav navbar-nav flex-row justify-content-between ml-auto" >
        <li class="nav-item ">
            <a class="nav-link " href="#"> Log out</a>
          </li>
         
    </ul>
    
  </nav>
<h2  style="margin: 2% 0% 0% 40%">Update your Product</h2>
 <!-- Modal -->
 <div class="container py-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            
              <form action="" method="Post" class="was-validated" >
                  <div class="form-group row">
                  <div class="col-sm-6">
                      <label> Category Name </label>
                      <select type="text" pattern="[/^[a-zA-Z ]*$/]+" placeholder="Enter category name" class="form-control" name="category_name" required>
                      <option> Please select category </option>
                      <?php foreach($result3 as $kry => $value){ ?>
                        <option value="<?=$value['category_name'] ;?>"><?=$value['category_name'] ;?></option>
                        
                        <?php  } ?>
                      </select>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with english letters only.</div>
                      </div>
                
      
                  <div class="col-sm-6">
                      <label> Product Name </label>
                      <input type="text" pattern="[/^[a-zA-Z ]*$/]+" placeholder="Enter product name" value="<?php  echo  $row['Product_Name']; ?>" class="form-control" name="Product_Name" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with english letters only.</div>
                  </div>
                  </div>

                  <div class="form-group row">
                  <div class="col-sm-6">
                    <label> Ingredience </label>
                    <input type="text" placeholder="Enter ingredience" value="<?php  echo  $row['Ingredience']; ?>" class="form-control" name="Ingredience" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
      
                  <div class="col-sm-6" id="price">
                      <label> Price </label>
                      <input type="number" min="1" placeholder="Enter price" value="<?php  echo  $row['Price']; ?>" class="form-control" name="Price"  required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with postive number.</div>
                  </div>
                  </div>
      
                 

                <div class="form-group row">
                  <div class="col-sm-6">
                  <label> Source </label>
                  <input type="text" placeholder="Enter name of restaurant" value="<?php  echo  $row['Source']; ?>" class="form-control" name="Source" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="col-sm-6">
                <label> Nutritional Facts </label>
                <input type="text" placeholder="Enter nutritional facts" value="<?php  echo  $row['Nutritional_Facts']; ?>"  class="form-control" name="Nutritional_Facts" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-6">
                    <label> Image of Product </label>
                    <br>
                    <input type="file"  name="Product_image" value="<?php  echo  $row['Product_image']; ?>">
                    <!-- <div class="valid-feedback">Valid.</div> -->
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <button name="submit_btn" class="btn btn-success" style="background-color: #fe4854;   border: none;  margin-right:20px; margin-left:15px; margin-top: 13px; height: 49px;  width: 90px; font-weight:bold ; font-size:20px;"> Update </button>
                 
              </div>
               
            <!-- <input type="submit"> -->
           
                 
          
          
        </form>
        </div>
    </div>
</div>
   
<footer class="text-center text-white" style="background-color: #0d151b  ; margin-top:50px">
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
        <!-- Github -->
        <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button"
          data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->

      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center" style="color: #daecf0;">
        © tasty Copyright

      </div>
      <!-- Copyright -->
  </footer>
  <!-- Footer -->

</body>
</html>
<?php
}
else{
    header("Location:log_in.php");
    exit();

}
?>