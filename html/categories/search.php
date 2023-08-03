<?php 
session_start();
include '../Connect.php';

    $query = $_GET['query'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search | <?php echo $query ?></title>
    <?php include 'headTag.html';?>
</head>

<body>
    <!-- nav -->
    <?php if(isset($_SESSION["Email"]))
{
    include "..\NavbarCategory.php";

?>
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
                       
                    $min_length = 1;
                    if(strlen($query) >= $min_length){
                            
                            $query = htmlspecialchars($query); 
                            // changes characters used in html to their equivalents, for example: < to &gt;
                      
                            // makes sure nobody uses SQL injection
                            $productQuery = "SELECT * FROM product WHERE (`Product_Name` LIKE '%".$query."%') OR (`Source` LIKE '%".$query."%')" ;
                            $productResult=$conn ->query($productQuery);
                            ?>
                            <div style="margin-top:65px;">
                            <?php include 'productsList.php';?>
                            </div>
                            <?php 
                    }
                    else{
                            echo "Minimum length is ".$min_length;
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <?php include '../footer.php';
}
else{
    header("Location:../log_in.php");
    exit();

}
        
        ?>