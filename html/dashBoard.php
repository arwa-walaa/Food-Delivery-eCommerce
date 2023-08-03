<?php
session_start();

if(isset($_SESSION['Email'])&& $_SESSION['user_type']=='admin')
{
  $email=$_SESSION['Email'];
$db= mysqli_connect("localhost","root","","tasty_db");
$sql="SELECT * FROM `user` where `Email`='$email' AND `user_type`='admin'";
$query=mysqli_query($db,$sql);
$rows = mysqli_fetch_array($query);





    
    include 'Connect.php';
    $query = "select distinct category.category_name,count(Product_Name) as NumberOfProductPerCategory 
              from category,product 
              where category.category_name=product.Category_Name 
              group by category_name;";
    $result= mysqli_query($conn,$query);

    $query3 = "select distinct product.Category_Name ,count(DISTINCT product.Source) as NumberOfSourcesPerCategory 
    from product 
    group by product.Category_Name;";
$result3= mysqli_query($conn,$query3);

    $query2 = "select distinct category.category_name,max(Price) as MaxProductPerCategory 
    from category,product 
    where category.category_name=product.Category_Name 
    group by category_name;";

    $result2= mysqli_query($conn,$query2);
    while($columnChart=mysqli_fetch_array($result2)){
      $categoryName[]=$columnChart['category_name'];
      $maxPrice[]=$columnChart['MaxProductPerCategory'];
    }

 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DashBoard</title>
    <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    /* .navbar {
      margin-bottom: 0;
      border-radius: 0;
    } */


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



    /* .navbar {
      width: 100%;
      position: fixed;
      
    } */
    .text_photo {
        font-size: 20px;
        color: #2a6971;
    }

    footer i,
    footer .text-center {
        color: #daecf0;
    }
    </style>

    <script type="text/javascript" src="loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Category", "Number of products for each category"],
           <?php
            while($row = mysqli_fetch_array($result))  
            {  
                 echo "['".$row["category_name"]."', ".$row["NumberOfProductPerCategory"]."],";  
            }  
           ?>

        ]);

        var options = {
            title: "Number of products for each category ",
            is3D: true,
        };

        var chart = new google.visualization.PieChart(
            document.getElementById("piechart_3d")
        );
        chart.draw(data, options);
    }
    </script>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Example 5</title>

    <script type="text/javascript" src="loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["bar"]
    });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ["Category Name", "Max Price"],
      //       ["First week", 44],
      // ["Second week", 31],
      // ["Third week", 12],
      // ["Fourth week", 10],


           
        ]);

        var options = {
            width: 800,
            legend: {
                position: "none"
            },
            chart: {
                title: "Maximum price of all products per category",

            },
            axes: {
                x: {
                    0: {
                        side: "top",
                        label: "White to move"
                    }, // Top x-axis.
                },
            },
            bar: {
                groupWidth: "90%"
            },
        };

        var chart = new google.charts.Bar(document.getElementById("top_x_div"));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>

    <!-- *********************************************************** -->

 <script type="text/javascript" src="loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Category", "Number of products for each category"],
            <?php
            while($row3 = mysqli_fetch_array($result3))  
            {  
                 echo "['".$row3["Category_Name"]."', ".$row3["NumberOfSourcesPerCategory"]."],";  
            }  
           ?>

        ]);

        var options = {
            title: "Number of sources for each category ",
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(
            document.getElementById("piechart2_3d")
        );
        chart.draw(data, options);
    }
    </script>

<!-- *********************************************************** -->




</head>


<body>
  
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        
        <li><a class="nav-link active" style="font-family: 'Bilbo';font-size: 22px;" href="#">Tasty</a> </li>
        <li><a class="nav-link " href="homePage.php">Home</a> </li>
        <li><a class="nav-link " href="admin.php">Admin Panel</a></li>
        <li><a class="nav-link active" href="../html/dashBoard.php">Dashboard</a></li>
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
            Welcome to DashBoard
        </h1>
    </div>

    <div id="piechart_3d" style="width: 650px; height: 400px ; margin-left:-60px; margin-top:40px;"></div>
    
    <!-- <div id="top_x_div" style="width: 300px; height: 600px ; margin-left:700px; margin-top: -450px;"></div> -->
    <div id="piechart2_3d" style="width: 650px; height: 400px ; margin-left:50%; margin-top:-400px;"></div><br>
    <canvas id="myChart" style="width:80%;max-width:500px; margin-left:400px; margin-bottom: 9%;margin-top: 0%;"></canvas>
    
    <script type="text/javascript">
    // var xValues = ["First week", "Second week", "Third week", "Fourth week"];
    // var yValues = [55, 49, 44, 24];
    var barColors = ["red", "green", "blue", "orange"];
    new Chart("myChart", {
        type: "bar",
        data: {
            labels: <?php echo json_encode($categoryName);?>,
            datasets: [{
                backgroundColor: barColors,
                data: <?php echo json_encode($maxPrice);?>
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Maximum price of all products per category in 2022"
            },
            scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          // callback: function(value) {if (value % 1 === 0) {return value;}}
        }
      }]
    }
        }
    });
    </script>

    <footer class="text-center text-white" style="background-color:  #0d151b  ; margin-top: 150px;">
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