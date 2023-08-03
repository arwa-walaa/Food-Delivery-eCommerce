
<?php
session_start();
if(isset($_SESSION['Email'])&& $_SESSION['user_type']=='admin'){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Product</title>
  

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
            /* position: relative; */
            
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
            border-radius: 5px;
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
            /* position: fixed; */
           
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


<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li><a class="nav-link active" href="#">Tasty</a> </li>
        <li><a class="nav-link " href="admin.php">Admin Panel</a></li>
        <li><a class="nav-link " href="dashBoard.php">Dashboard</a></li>
        <li><a class="nav-link active" href="AddProduct.php">Add Product</a></li>
     
    </ul>
    <ul class="nav navbar-nav flex-row justify-content-between ml-auto" >
        <li class="nav-item ">
            <a class="nav-link " href="logout.php"> Log out</a>
          </li>
         
    </ul>
    
  </nav>

  
  <div>

    <br>
   
    <h1 style="text-align: center;">
      Welcome to Admin Panel 
  </h1>
 <button type="button" class="button" style=" text-align: center;" data-toggle="modal" data-target="#myModal">Add Your Category 🤍</button>
 

           <!-- Modal -->
    <div class="modal" id="myModal2">
      <div class="modal-dialog" >
        <div class="modal-content" style="width: 700px;height: 76rem; border-radius: 10px; margin-left: -18%;">
          <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <br>
             <h4 class="modal-title" style="margin: 3% -6% 3% -54%;">Add your Category</h4>
              <form style="margin:12% 10% auto -48%;width:78%"action="" method="Post" class="was-validated" >
                  <div class="form-group">
                      <label> Category Name </label>
                      <select  pattern="[/^[a-zA-Z ]*$/]+" class="form-control"  placeholder="Enter category name" name="Category_Name" required>
                     
                          <?php echo $options;?>
                      </select>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with english letters only.</div>
 
                  </div>
      
                  <div class="form-group">
                      <label> Category Name </label>
                      <input type="text" pattern="[/^[a-zA-Z ]*$/]+" placeholder="Enter category name" class="form-control" name="Category_Name" required>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback">Please fill out this field with english letters only.</div>
                  </div>
                  
                  <div class="form-group">
                    <label> Image of Category </label>
                    <input type="file"  name="Category_image" >
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
 
                  <button name="submit_btn"> Submit </button>                
          
              </div>
                
              </div>
            </div>
            
  </div>
          
        </form>
        <?php
     
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

if(isset($_POST['submit_btn'])){
  $Product_Name=$_POST['Product_Name'];
  $Category_Name=$_POST['Category_Name'];
  $Price=$_POST['Price'];
  $Ingredience=$_POST['Ingredience'];
  $Quantity=$_POST['Quantity'];
  $Product_image=$_POST['Product_image'];
  $Source=$_POST['Source'];
  $Nutritional_Facts=$_POST['Nutritional_Facts'];

$sql = "INSERT INTO product(Product_Name,Category_Name,Price,Ingredience,Quantity,Product_image,Nutritional_Facts,Source) VALUES('$Product_Name','$Category_Name',$Price,'$Ingredience',$Quantity,'$Product_image','$Nutritional_Facts','$Source')";

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

      
  </div>

  <div class="container mt-3" >
    <h2>All Products</h2>
    <p>Type something in the input field to search the table for category name, product name, ingredience, price, quantity, source or nutritional facts:</p>  
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <table class="table table-bordered" >
      <thead>
        <tr>
          <th>ID</th>
          <th>Product Name</th>
          <th>Category Name</th>
          <th>Price</th>
          <th>Ingredience</th>
          <th>Quantity</th>
          <th>Image of Product</th>
          <th>Nutritional Facts</th>
          <th>Source</th>
          <th>Rate</th>
        </tr>
      </thead>
<?php ?>
      <tbody id="myTable">
        <?php
       $db= mysqli_connect("localhost","root","","tasty_db");
       $query=mysqli_query($db,"SELECT * FROM product");
 
       while($row=mysqli_fetch_assoc($query)){
         echo "<tr>";
         echo "<td>".$row['ID']."</td>";
         echo "<td>".$row['Product_Name']."</td>";
         echo "<td>".$row['Category_Name']."</td>";
         echo "<td>".$row['Price']."</td>";
         echo "<td>".$row['Ingredience']."</td>";
         echo "<td>".$row['Quantity']."</td>";
         echo "<td>".$row['Product_image']."</td>";
         echo "<td>".$row['Nutritional_Facts']."</td>";
         echo "<td>".$row['Source']."</td>";
         echo "<td>".$row['Rate']."</td>";
         echo "</tr>";

       }
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
        © 2022 Copyright

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