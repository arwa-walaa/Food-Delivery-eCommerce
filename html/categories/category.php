<?php
    //error_reporting(E_ERROR | E_PARSE);
     session_start();
     if(isset($_SESSION["Email"]))
    {
        include "../NavbarCategory.php";
       
    include '../Connect.php';
    if(isset($_GET['categoryName'])){
    $categoryName = $_GET['categoryName']; 
    }
    else{
        $categoryName = 'SandwitchAndCrepe';
    }
    $productQuery ="SELECT * FROM product WHERE Category_Name='$categoryName'
    ORDER BY sells_count DESC;";
    $productResult=mysqli_query($conn,$productQuery);

   
    $test=mysqli_query($conn,"SELECT * from user  where Email='$Email'");
    $row=mysqli_fetch_assoc($test);
     
    
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Category | <?php echo $categoryName ?></title>
    <?php include 'headTag.html';?>
    <script>
    function showProductDetails(productId) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productDetailsModal").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "productDetails.php?ID=" + productId, true);
        xmlhttp.send();
    }
    </script>

</head>

<body>
    <!-- nav -->

    <!-- -------------------------->
    <div class="container-fluid" id="categoryPage">
        <div class="row">
            <!--------- side bar --------->
            <div class="col-sm-3">

                <?php include 'sidebar.php';?>
            </div>
            <!--------- main body --------->
            <div class="col-sm-9">
                <div id="productContainer">
                    
                    

                    <?php
                        if(mysqli_num_rows($productResult) > 0){ 
                            $counter =0;
                            while($products = mysqli_fetch_assoc( $productResult)):
                                ?>

                    <?php if($counter%3==0) : ?>
                    <!--this is the div close of row as long as it isnt the first row-->
                        <?php if($counter!=0) : ?>
                        </div>
                        <?php endif; ?>
                        <!-- top sellers "ranking report" -->
                        <!-- conditions to make top three div -->
                        <?php if($counter==0) : ?>
                            <div id="bestSellers">
                            <h2 style="margin-top: 5px;margin-left: 15px;">Top Three </h2>
                        <?php endif; ?>
                        <?php if($counter==3) : ?>
                        </div>
                        <?php endif; ?>
                <div class="row product-list" style="margin-bottom:40px">
                    <?php endif; ?>

                    <div class="col-sm-4">

                        <section class="card" style="height:330px">

                            <div class="card-img-top">
                                <img src="..\Cat_images\<?php  echo $products['Product_image']; ?>" alt="<?= $products['Product_Name']; ?>" style="width:342px;height:200px" />
                                <button type="button" class="adtocart" class="btn btn-primary " data-toggle="modal"
                                    data-target="#productDetails" onclick="showProductDetails(<?= $products['ID'];?>)">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                            </div>

                            <div class="card-body text-center">
                                <h4>
                                    <a data-toggle="modal" data-target="#productDetails" class="prouctTitle">
                                        <?= $products['Product_Name'];?>
                                    </a>
                                </h4>
                                <p class="price"><?= $products['Price'];?>L.E</p>
                            </div>
                            <?php if($counter<3) : ?>
                                <div class="card-badge "><b> <?php echo $counter+1 ?> </b></div>
                            <?php endif; ?>
                        </section>
                    </div>

                    <?php $counter++; ?>
                    <?php endwhile; ?>
                </div>
                <?php 
    }
    else{ 
    //echo "No results";
    }
    include 'productModal.php';
?>
                <!-- end of product list -->

            </div>



        </div>

        
    </div>
    </div>
    </div>
    </div>

    <!-- footer -->
    <?php include '../footer.php';?>

</body>


</html>
<?php
}
else{
    header("Location:../log_in.php");
    exit();

}
?>