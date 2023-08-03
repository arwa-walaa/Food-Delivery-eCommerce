<?php

 if(isset($_SESSION["Email"]))
{

?>

<head>
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
<div class="row product-list">
    <?php endif; ?>

    <div class="col-sm-4">

        <section class="card">

            <div class="card-img-top">
                <img src="..\Cat_images\<?=  $products['Product_image']; ?>" alt="<?= $products['Product_Name'];?> " style="width:342px;height:200px"  >
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
        </section>
    </div>

    <?php $counter++; ?>
    <?php endwhile; ?>
</div>
<?php 
    }
    else{ 
    echo "No results";
    }
    include 'productModal.php';
?>
<!-- end of product list -->

<?php
}
else{
    header("Location:../log_in.php");
    exit();

}
?>
