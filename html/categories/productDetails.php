<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
 if(isset($_SESSION["Email"]))
{

?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'headTag.html';?> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
   .card-img, .card-img-top {
    border-top-left-radius: calc(.25rem - 1px);
    border-top-right-radius: calc(.25rem - 1px);
 
    height: 200px;}
</style>

<body>
    <?php
        
        error_reporting(E_ERROR | E_PARSE);
        $ID = intval($_GET['ID']);
        $_SESSION['ID']=$ID; 
        include '../Connect.php';
        $productQuery ="SELECT * FROM product WHERE ID = $ID";
        $productResult=$conn ->query($productQuery);
        $email=$_SESSION['Email'];
        $date=date('d-m-y h:i:s');
        $user_data = '&Email='. $email. '&Product_ID='. $ID.'&Order_Date='. $date ;
        if(isset($_POST['AddtoCard']))
        {
            
        $productQuery ="SELECT * FROM product WHERE ID = $ID";
        $productResult=$conn ->query($productQuery);
            
        }
           
            while($productsDetails = mysqli_fetch_assoc( $productResult)){                 
            ?>
            <div class="height d-flex justify-content-center align-items-center\">
            
                <div class="col-sm-12">
                
                <h3 class="modal-title"><b><?= $productsDetails['Product_Name'];?></b></h3>
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="mt-2">
                            <h4 class="text-uppercase"><?= $productsDetails['Source'];?></h4>
                            <div class="mt-5">

                                
                                <div class="d-flex flex-row user-ratings">
                                    <div class="ratings"> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> </div>
                                    <h6 class="text-muted ml-1">4/5</h6>
                                </div>

                            </div>
                        </div>
                        <div class="image" id="productDetailsImage">
                        <img class="img_cat" src="..\Cat_images\<?php  echo $productsDetails['Product_image']; ?>" alt=" <?= $productsDetails['Product_Name'];?>"/>
                            <h1 class="main-heading mt-0" style="padding-left: 40px;"><?= $productsDetails['Price'];?>L.E</h1>
                        </div>
                    </div>
                    <h4>Ingredients:</h4>
                    <p><?= $productsDetails['Ingredience'];?></p>
                    <h4>Nutritional facts :</h4>
                    <p><?= $productsDetails['Nutritional_Facts'];?></p>
                </div>
            </div>
            <?php
            
    }

mysqli_close($conn);
}else{
    header("Location:../log_in.php");
    exit();

}
?>
</body>

</html>
