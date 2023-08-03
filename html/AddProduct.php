<?php
session_start();

if(isset($_SESSION['Email'])&& $_SESSION['user_type']=='admin')
{
  $email=$_SESSION['Email'];
$db= mysqli_connect("localhost","root","","tasty_db");
$sql="SELECT * FROM `user` where `Email`='$email' AND `user_type`='admin'";
$query=mysqli_query($db,$sql);
$rows = mysqli_fetch_array($query);
     
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "tasty_db";
     
     
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     
     
     // Check connection
     if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
     }
     $select = "SELECT * FROM `category`";
     $result3 = mysqli_query($conn,$select);
     
     $productQuery = "SELECT * FROM `product`";
     $product = mysqli_query($conn,$productQuery);
     
  
     if(isset($_POST['submit_btn'])){
       $Product_Name=$_POST['Product_Name'];
       $category_name=$_POST['category_name'];
       $Price=$_POST['Price'];
       $Ingredience=$_POST['Ingredience'];
       $Product_image=$_POST['Product_image'];
       $Source=$_POST['Source'];
       $Nutritional_Facts=$_POST['Nutritional_Facts'];
   
     
     $sql = "INSERT INTO product(Product_Name,category_name,Price,Ingredience,Product_image,Nutritional_Facts,Source) VALUES('$Product_Name','$category_name',$Price,'$Ingredience','$Product_image','$Nutritional_Facts','$Source')";
     
     
     
     if ($conn->query($sql) === TRUE) {
       echo
       "
       <script> alert('Data Inserted Successfully'); </script>
       ";
     
     } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }
     
     
     $query = "SELECT * FROM `category`";
     
     $result1 = mysqli_query($conn, $query);
     $result2 = mysqli_query($conn, $query);
     $options = "";
     while($row2 = mysqli_fetch_array($result2))
     {
      $options = $options."<option>$row2[1]</option>";
     }
      
     
     $conn->close();
     }
     
     if(isset($_POST['submit_btn2'])){
       $category_name=$_POST['category_name'];  
       $category_image=$_POST['category_image'];
      
     
     $sql = "INSERT INTO category(category_name,category_image) VALUES('$category_name','$category_image')";
     
     
     
     if ($conn->query($sql) === TRUE) {
       echo
       "
       <script> alert('Data Inserted Successfully'); </script>
       ";
     
     } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }
     
     
     $query = "SELECT * FROM `category`";
     
     $result1 = mysqli_query($conn, $query);
     $result2 = mysqli_query($conn, $query);
     $options = "";
     while($row2 = mysqli_fetch_array($result2))
     {
      $options = $options."<option>$row2[1]</option>";
     }
     $conn->close(); 
    }

      
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Product</title>
  
  <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

 <script src='https://www.google.com/recaptcha/api.js'></script>

  <style>

    /* Remove the navbar's default margin-bottom and rounded borders */
    .form_Container {        
            background-color: #F1F1F1;
            width: 600px;
            height: 600x;
            display: flex;
            flex-direction: column;
            position: relative; 
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 35px;
            border-radius: 5px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);
            margin-top: 50%;
   
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        input {
            width: 100%;
            margin: 5px 0 15px 0;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #c7c0c0;
         
        }

        input:focus {
            outline: none;
            border-color: #fe4854;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        button {
            margin: 13px 0 0 0;
            padding: 10px;
            font-weight: bold;
            font-size: medium;
            background-color: #fe4854;
            color: #ffffff;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            transition: background-color 0.2s;
            
        }

        button:focus {
            outline: none;
        }

        button:hover {
            background-color: #c44a52;
        }

        .star {
            position: relative;
        }

        .star::after {
            content: "*";
            color: red;
            position: absolute;
            right: 10px;
            top: 30px;
            font-size: 22px;
        }
        .header{
            margin-top: -4%;
        }
    .button {
            margin: 13px 0 0 43%;
            padding: 10px;
            font-weight: bold;
            font-size: medium;
            background-color: #fe4854;
            color: #ffffff;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: background-color 0.2s;
            height: 58px;
            text-align: center;
          
        }

        button:focus {
            outline: none;
        }

        button:hover {
            background-color: #c44a52;
        }
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
            width: 100%;
            position: sticky;
            top: 0;
            z-index: 100;

        }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      width: auto;
      padding: 50px;
    }

    
    .text_photo
    {
      font-size: 20px;
      color: #2a6971;
    }
    footer i,footer .text-center {
    color: #daecf0;
}

  </style>
  <script>
    function validation(){
     var x= document.getElementById("price").value;
     if(x==0 || x<-1){
       alert("please enter postive number in price field")
       return false;

     }return true;
   }

  
  </script>
</head>


<body >
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        
        <li><a class="nav-link active" style="font-family: 'Bilbo';font-size: 22px;" href="#">Tasty</a> </li>
        <li><a class="nav-link " href="homePage.php">Home</a> </li>
        <li><a class="nav-link " href="admin.php">Admin Panel</a></li>
        <li><a class="nav-link " href="../html/dashBoard.php">Dashboard</a></li>
        <li><a class="nav-link " href="Orders.php">Orders</a></li>
        <li><a class="nav-link active" href="../html/AddProduct.php">Add Product</a></li>
        
        </ul>
     
    </ul>
    <ul class="nav navbar-nav flex-row justify-content-between ml-auto" >
        <li class="nav-item ">
        <li><a class="nav-link " href="Card.php">Cart</a> </li>
        
                <li class="nav-item ">
                    <a class="nav-link " href="Profile.php">
                       <i class="fa fa-user"></i>
                    <?php echo $rows['User_Name'];?> 
                  </a>
                </li>
                <li><a class="nav-link " href="logout.php">Log out</a> </li>
                
          </li>
          
    </ul>
    
  </nav>


  
  <div>

    <br>
   
    <h1 style="text-align: center;">
      Welcome to Admin Panel  
  </h1>
 <button type="button" class="button" style="border-radius: 7px; text-align: center; margin-left: 36%  " data-toggle="modal" data-target="#myModal">Add Your Product </button>
 <button type="button" class="button" style="border-radius: 7px; text-align: center; margin-left: 1%" data-toggle="modal" data-target="#myModal2">Add Your Category </button>


           <!-- Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog" >
        <div class="modal-content" style="width: 700px;height: 76rem; border-radius: 10px; margin-left: -18%;">
          <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <br>
             <h4 class="modal-title" style="margin: 3% -6% 3% -54%;">Add your Product</h4>
              <form style="margin:12% 10% auto -48%;width:78%"action="AddProduct.php" method="Post" class="was-validated" >
                  <div class="form-group">
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
      
                  <div class="form-group">
                      <label> Product Name </label>
                      <input type="text" pattern="[/^[a-zA-Z ]*$/]+" placeholder="Enter product name" class="form-control" name="Product_Name" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with english letters only.</div>
                  </div>
                  <div class="form-group">
                    <label> Ingredience </label>
                    <input type="text" placeholder="Enter ingredience" class="form-control" name="Ingredience" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
      
                  <div class="form-group" id="price">
                      <label> Price </label>
                      <input type="number" min="1" placeholder="Enter price" class="form-control" name="Price"  required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with postive number.</div>
                  </div>
      
                  <div class="form-group">
                    <label> Image of Product </label>
                    <input type="file"  name="Product_image" >
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                  <label> Source </label>
                  <input type="text" placeholder="Enter name of restaurant" class="form-control" name="Source" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group">
                <label> Nutritional Facts </label>
                <input type="text" placeholder="Enter nutritional facts" class="form-control" name="Nutritional_Facts" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
                  <button name="submit_btn"> Submit </button>
              </div>
              </div>
            </div>
            
  </div>
          
        </form>
                  <!-- Modal -->
    <div class="modal" id="myModal2">
      <div class="modal-dialog" >
        <div class="modal-content" style="width: 700px;height: 30rem; border-radius: 10px; margin-left: -18%;">
          <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <br>
             <h4 class="modal-title" style="margin: 3% -6% 3% -54%;">Add your Category</h4>
              <form style="margin:12% 10% auto -48%;width:78%"action="" method="Post" class="was-validated" >
                    
                  <div class="form-group">
                      <label> Category Name </label>
                      <input type="text" pattern="[/^[a-zA-Z ]*$/]+" placeholder="Enter category name" class="form-control" name="category_name" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with english letters only.</div>
                  </div>
                  
                  <div class="form-group">
                    <label> Image of Category </label>
                    <input type="file"  name="category_image" >
                    
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
             
               
           
                  <button name="submit_btn2"> Submit </button>
                 
          
              </div>
                
              </div>
            </div>
            
  </div>
          
        </form>
     
           <!-- Modal -->
    <div class="modal" id="myModal3">
      <div class="modal-dialog" >
        <div class="modal-content" style="width: 700px;height: 76rem; border-radius: 10px; margin-left: -18%;">
          <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <br>
             <h4 class="modal-title" style="margin: 3% -6% 3% -54%;">Add your Product</h4>
              <form style="margin:12% 10% auto -48%;width:78%"action="AddProduct.php" method="Post" class="was-validated" >
                  <div class="form-group">
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
      
                  <div class="form-group">
                      <label> Product Name </label>
                      <input type="text" pattern="[/^[a-zA-Z ]*$/]+" placeholder="Enter product name" class="form-control" name="Product_Name" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with english letters only.</div>
                  </div>
                  <div class="form-group">
                    <label> Ingredience </label>
                    <input type="text" placeholder="Enter ingredience" class="form-control" name="Ingredience" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
      
                  <div class="form-group" id="price">
                      <label> Price </label>
                      <input type="number" min="1" placeholder="Enter price" class="form-control" name="Price"  required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with postive number.</div>
                  </div>
  
                  <div class="form-group">
                    <label> Image of Product </label>
                    <input type="file"  name="Product_image" >
                    <!-- <div class="valid-feedback">Valid.</div> -->
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                  <label> Source </label>
                  <input type="text" placeholder="Enter name of restaurant" class="form-control" name="Source" required>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
              </div>
              <div class="form-group">
                <label> Nutritional Facts </label>
                <input type="text" placeholder="Enter nutritional facts" class="form-control" name="Nutritional_Facts" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
               
            <!-- <input type="submit"> -->
                  <button name="update_btn"> Update Date </button>
                 
          
              </div>
                
              </div>
            </div>
            
  </div>
          
        </form>

 
  
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->
        
      
  </div>

  <div class="container mt-3" >
    <!-- <table class="table table-striped"></table> -->
    <h2>All Products</h2>
    <p>Type something in the input field to search the table for category name, product name, ingredience, price, quantity, source or nutritional facts:</p>  
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    
    <table class="table table-bordered" style="background-color:white;">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Category Name</th>
          <th scope="col">Price</th>
          <th scope="col">Ingredience</th>
          <th scope="col">Nutritional Facts</th>
          <th scope="col">Source</th>
          <th scope="col">Sells Count</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody id="myTable">
        <?php
       $db= mysqli_connect("localhost","root","","tasty_db");
       $sql="SELECT * FROM product";
       $query=mysqli_query($db,$sql);
    if($query)  { 
       while($row=mysqli_fetch_assoc($query)){
       
        $ID=$row['ID'];
        $Product_Name=$row['Product_Name'];
        $Category_Name=$row['Category_Name'];
        $Price=$row['Price'];
        $Ingredience=$row['Ingredience'];
        $Nutritional_Facts=$row['Nutritional_Facts'];
        $Source=$row['Source'];
        $sells_count=$row['sells_count'];

        echo '<tr>
        <th scope="row">'.$ID.'</th>
        <td>'.$Product_Name.'</td>
        <td>'.$Category_Name.'</td>
        <td>'.$Price.'</td>
        <td>'.$Ingredience.'</td>    
        <td>'.$Nutritional_Facts.'</td>
        <td>'.$Source.'</td>
        <td>'.$sells_count.'</td>

        <td>
     
        <button class="btn btn-danger" style=" background-color:#fe4854;" ><a href="delete.php?
        deleteID='.$ID.'"
         calss="text-light" style="color:white;text-decoration:none;">Delete</a></button>
        <button class="btn btn-success"  ><a href="edit.php?
        editid='.$ID.'"
         calss="text-light" style="color:white;text-decoration:none;">Update</a></button> 
        
  
      </td>
        </tr>';
       
       }}

        ?>
           </tbody>

    </table>
    
    

  </div>
  
  <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
 

  <footer class="text-center text-white" style="background-color: #0d151b ; margin-top: 50px;" >
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


  <!-- <div class="container my-5"> -->
  <!-- Footer -->

  <!-- End of .container -->
  <!-- </div> -->
</body>

</html>
<?php
}
else{
    header("Location:log_in.php");
    exit();

}
?>