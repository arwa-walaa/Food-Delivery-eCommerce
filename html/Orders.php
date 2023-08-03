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

     
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  
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
  
</head>


<body >
    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        
        <li><a class="nav-link active" style="font-family: 'Bilbo';font-size: 22px;" href="#">Tasty</a> </li>
        <li><a class="nav-link " href="homePage.php">Home</a> </li>
        <li><a class="nav-link " href="admin.php">Admin Panel</a></li>
        <li><a class="nav-link " href="../html/dashBoard.php">Dashboard</a></li>
        <li><a class="nav-link active" href="Orders.php">Orders</a></li>
        <li><a class="nav-link " href="../html/AddProduct.php">Add Product</a></li>
        
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
      Orders Details  
  </h1>
 

  <div class="container mt-3" >
    <!-- <table class="table table-striped"></table> -->
    <h2>All Orders</h2>
    <p>Type something in the input field to search the table for product id, email, order date,
         total price: </p>  
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    
    <table class="table table-bordered" style="background-color:white;">
      <thead>
        <tr>         
          
          <th scope="col">Email</th>
          <th scope="col">Order Date</th>
          <th scope="col">Total Price</th>
         
        </tr>
      </thead>

      <tbody id="myTable">
        <?php
       $db= mysqli_connect("localhost","root","","tasty_db");
       $sql_order="SELECT Product_ID,Email,Order_Date ,SUM(Price) as totalPrice
        from `product` INNER JOIN `order` on `ID`=`Product_ID` 
         group by `Email`";
      
    
       $query=mysqli_query($db,$sql_order);
    if($query)  { 
       while($row=mysqli_fetch_assoc($query)){
              
       
        $Email=$row['Email'];
        $Order_Date=$row['Order_Date'];
        $totalPrice=$row['totalPrice'];
      
        // $Price=$row['Price'];
      
     
        echo '<tr>
       
        <td>'.$Email.'</td>
     
        <td>'.$Order_Date.'</td>

       <td> 
       '.$totalPrice.'
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