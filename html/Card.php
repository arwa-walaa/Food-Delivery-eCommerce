
<?php
session_start();
if(isset($_SESSION["Email"]))
{
    include "LoginNavbar.php";
    include "Connect.php";
    $Email=$_SESSION['Email'];
    //
    $productQuery ="SELECT  * from `product` INNER JOIN `order` on `ID`=`Product_ID` where `Email`= '$Email'";
    //$productResult=mysqli_query($conn,$productQuery);
    $result = $conn->query($productQuery);
    $Total_Price="SELECT SUM(Price) as totalPrice from `product` INNER JOIN `order` on 
    `ID`=`Product_ID` where `Email`= '$Email';";
    $Price_result = $conn->query($Total_Price);
    
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Bilbo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
  <script>
    function myFunction(productId, orderDate) {
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "deleteItem.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("ID="+ productId+"&Order_Date="+orderDate);
        xmlhttp.send();
    }

    
    </script>
    
    <style>
        body {
            background-color: #daecf0;
            
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
        .title {
            margin-bottom: 5vh
        }

        .card {
            
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
            margin-top:40px;
            margin-left: 19%;
            margin-bottom:130px
            
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto
            }
        }

       

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem
            }
        }

        .summary {
            background-color: #daecf0;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: #2a6971;
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem
            }
        }

        .summary .col-2 {
            padding: 0
        }

        .summary .col-10 {
            padding: 0
        }

        .row {
            margin: 0
        }

        .title b {
            font-size: 1.5rem
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%
        }

        .col-2,
        .col {
            padding: 0 1vh
        }

        a {
            padding: 0 1vh
        }

        .btn-close {
            margin-left: auto;
            font-size: 0.7rem
        }

        img {
            width: 3.5rem
        }

        .back-to-shop {
            margin-top: 4.5rem
        }

        h5 {
            margin-top: 4vh
        }

        hr {
            margin-top: 1.25rem
        }

        form {
            padding: 2vh 0
        }

        select {
            border: 1px solid #2a6971;
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247)
        }

        input {
            border: 1px solid #2a6971;
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247)
        }

        input:focus::-webkit-input-placeholder {
            color: transparent
        }

        .button {
            background-color: #2a6971;;
            border-color: #2a6971;;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0

        }

        /* .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
           
            transition: none
        }

        .btn:hover {
            color: white
        } */

        a {
            color: black
        }

        a:hover {
            color: black;
            text-decoration: none
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center
        }
        /* #profile
        {
           margin-left: 2200%;
        } */
    </style>
</head>

<body>
    
        <!-- <br><br><br><br><br> -->
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text">#<?php echo mysqli_num_rows($result);?></div>
                    </div>
                </div>

                <?php
                    if(mysqli_num_rows($result) > 0)
                    { 
                        while($products = mysqli_fetch_assoc( $result)):
                        $ID=$products['Product_ID'];

                        //echo $products['Product_Name'];     
                   ?>        
                
                <div class="row border-top border-bottom">
                    
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid" src="Cat_images\<?=  $products['Product_image']; ?>"></div>
                        <div class="col">
                            <div class="row text-muted">
                                <?php echo $products['Product_Name'];?> 
                            </div>
                            <div class="row"><?php echo $products['Source'];?></div>
                        </div>
                        <div class="col"> </div>
                        <div class="col"><?php echo $products['Price'];?></div>
                        <div>
                        <?php
                        echo '<button type="button" class="close"   >
                        <a href="deleteitem.php?deleteID='.$ID.'">&times;</a></button>'
                        ?>
                        </div>
                    </div>
                </div>
              
                    <?php endwhile; ?>


                <?php 
                    }
                    else{echo "No Items";}
               ?>

                
                <div class="back-to-shop"><a href="categories\category.php">&leftarrow;</a><span">Back to shop</span></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                
               
                <form>
                    
                
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right"><?php $products = mysqli_fetch_assoc( $Price_result); echo $products['totalPrice'];?></div>
                
                </form>
            </div>
        </div>
    </div>
                </div>
    <div style="margin-top:15%"> <?php include "footer.php"?></div>
    <script>
        function click(){
            console.log("hello");
        }
    </script>
   
            
    
</body>
    
</html>
<?php
}
else{
    header("Location:log_in.php");
    exit();

}
?>