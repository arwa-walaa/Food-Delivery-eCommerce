<?php
session_start();

if(isset($_SESSION['Email'] )&& $_SESSION['user_type']=='admin')
{
$email=$_SESSION['Email'];
$db= mysqli_connect("localhost","root","","tasty_db");
$sql="SELECT * FROM `user` where `Email`='$email' AND `user_type`='admin'";
$query=mysqli_query($db,$sql);
$rows = mysqli_fetch_array($query);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

  <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
   

    /* Add a gray background color and some padding to the footer */
    footer 
    {
      background-color: #f2f2f2;
      width: auto;
      padding: 50px;
    }

    
    .navbar
     {
            margin-bottom: 0;
            border-radius: 0;
            width: 100%;
            /* position: fixed; */
           
            position: sticky;
            top: 0;
            z-index: 100;

        }

    .text_photo
    {
      font-size: 20px;
      color: #2a6971;
    }
    footer i,footer .text-center 
    {
    color: #daecf0;
    }
  </style>
</head>

<body>
  
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        
        <li><a class="nav-link active" style="font-family: 'Bilbo';font-size: 22px;" href="#">Tasty</a> </li>
        <li><a class="nav-link " href="homePage.php">Home</a> </li>
        <li><a class="nav-link active" href="#">Admin Panel</a></li>
        <li><a class="nav-link " href="../html/dashBoard.php">Dashboard</a></li>
        <li><a class="nav-link " href="Orders.php">Orders</a></li>
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

  <br>

  <div>
      <h1 style="text-align:center">
          Welcome to Admin Panel  
      </h1>
  </div>

  
  <div class="container mt-3">
    <h2>Users Data</h2>
    <p>Type something in the input field to search the table for names, genders, emails, addresses, mobile numbers or birth dates:</p>  
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>



    <table class="table table-bordered" style="background-color:white;">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Password</th>
          <th scope="col">Email</th>
          <th scope="col">Birth Date</th>
          <th scope="col">Address</th>
          <th scope="col">Gender</th>
          <th scope="col">User Type</th>
          <th scope="col">User Action</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      
      <?php
       $db= mysqli_connect("localhost","root","","tasty_db");
      //  include('connection.php');
       $sql="SELECT * FROM `user`";
       $query=mysqli_query($db,$sql);

       while($rows = mysqli_fetch_array($query)){
         ?>
      <tbody id="myTable">
               <tr>
        <td><?php echo $rows['User_Name']; ?></td>
        <td><?php echo $rows['Password']; ?></td>
        <td><?php echo $rows['Email']; ?></td>
        <td><?php echo $rows['BirthDate']; ?></td>
        <td><?php echo $rows['Address']; ?></td>
        <td><?php echo $rows['Gender']; ?></td>
       
        <td>  
      <?php    
     
     if($rows['user_type']=="admin"){
          
      echo '<p> admin </p>';
    }else{
      echo '<p> user </p>' ;
    }
         
        ?>
    </td>
        <td>
       
       <?php
       
      
      if($rows['user_type']=="user"){
          
        echo '<button class="btn btn-danger" style=" background-color:#fe4854;"><a href="user_action.php?Email='.$rows['Email'].'&user_type=user" style="color:white;text-decoration:none;"> Admin </a>  </button> ';
      }else{
        echo '<button class="btn btn-success" ><a href="status.php?Email='.$rows['Email'].'&user_type=admin" style="color:white;text-decoration:none;">User </a> </button> ';
      }
      

 
       ?>
         </td>
    <td>  
      <?php    
     
     if($rows['status']==0){
          
      echo '<p> Unsuspended </p>';
    }else{
      echo '<p> suspended </p>' ;
    }
         
        ?>
    </td>

        <td>
       
       <?php
       
      
      if($rows['status']==0){
          
        echo '<button class="btn btn-danger" style=" background-color:#fe4854;"><a href="status.php?Email='.$rows['Email'].'&status=1" style="color:white;text-decoration:none;"> suspend </a>  </button> ';
      }else{
        echo '<button class="btn btn-success" ><a href="status.php?Email='.$rows['Email'].'&status=0" style="color:white;text-decoration:none;">Unsuspend </a> </button> ';
      }
      }

 
       ?>
         </td>

 <!-- <button class="btn btn-danger" style=" background-color:#fe4854;" href="status.php?Email='.$rows['Email'].'&status=1">suspend</button>       -->
   
        
  
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