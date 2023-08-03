<?php
    session_start();
    include '../Connect.php';

    $query = $_GET['max'];
    
    $productQuery = "SELECT * FROM `product` WHERE `Price` <= ".$query." ORDER BY `Price` ASC";
    $productResult=mysqli_query($conn,$productQuery);
    ?>
    <div style="margin-top:65px;">
    <?php include 'productsList.php';
?></div>
    </div>