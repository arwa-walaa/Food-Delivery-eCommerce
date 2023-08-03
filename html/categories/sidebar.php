<?php

 if(isset($_SESSION["Email"]))
{

?>

<head>
<?php include 'headTag.html';?>  
    <script>
    function filterProducts(maxPrice) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productContainer").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "priceFilterdProducts.php?max=" + maxPrice, true);
        xmlhttp.send();
    }
    </script>

    <script>
    function closeAd() {
        document.getElementById("ad").innerHTML = "";
    }
    </script>

</head>
<?php
      include '../Connect.php';
      $categoryQuery ="SELECT category_name  FROM category";
      $categoryResult=$conn ->query($categoryQuery);
 ?>
<!-- search and price range -->

<div class="row" style="margin-top:15px;">
    <div class="col-sm-11">
        <section class="card" id="searchCard">
            <div class="input-group search-containe">
                <div class="col-sm-10" style="padding:0px;">
                    <form action="search.php" method="GET">
                        <input type="text" name="query" class="form-control" placeholder="Search" style="width:100%;" />
                </div>
                <div class="col-sm-2" style="padding:0px;">
                    <div class="input-group-append">
                        <button class="btn btn-secondary search-button" type="submit" value="Search" style="height:39px; margin-left:2px;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                </form>

            </div>
            <div class="slidecontainer" id="slider-range">
                <header><b style="font: size 32px; margin-bottom: 0px;">Price Range</b></header>
                <input type="range" min="5" max="1500" value="50" class="slider" id="priceRange"
                    style="margin-bottom: 10px;" onmouseup="filterProducts(this.value)">
                <header style="margin-bottom: 0px;">Max Price: <span id="demo"></span></header>
            </div>
        </section>
    </div>
</div>
<!-- categories -->
<div class="row">
    <div class="col-sm-11">
        <section class="card" id="category">
            <div class="card-header">
                <b> Categories </b>
            </div>
            <div class="card-body" style="padding-top: 10px;">
                <div class="categoryList">
                    <?php
                                        while($categories = mysqli_fetch_assoc( $categoryResult)):
                                    ?>
                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link"
                                href="category.php?categoryName=<?= $categories['category_name']; ?>"><?= $categories['category_name']; ?>
                            </a>
                        </li>
                    </ul>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- ad -->
<div id="ad">
    <div class="row" style="margin-bottom:20px;">
        <div class="col-sm-11">
            <section class="card" style=" margin-bottom:25px;">
                <div class="card-header" style="padding: 0px 8px 3px 0px;">
                    <button type="button" class="close" onclick="closeAd()">&times;</button>
                </div>
                <div class="card-body" style="padding: 0px; ">
                    <!-- <a href="https://www.pepsi.com/"><img
                            src="https://i.pinimg.com/736x/a8/a8/54/a8a8547a0644ca2f50ff7bfadbde991c--pepsi-cola-magazine-ads.jpg"
                            style="width: 100%; border-radius: 3px;" alt="" /></a> -->

                            

                            <a href="https://www.pepsi.com/"><video controls autoplay muted width="500px" height="200px" controls="controls"  style="width: 100%;padding-top:0px" > 
                                <source src="..\Cat_images\pepsi_adv.mp4" type="video/mp4"> 
                            </video></a>

                            
                </div>
               
            </section>
        </div>
    </div>
</div>

<!-- slider script -->
<script>
var slider = document.getElementById("priceRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    output.innerHTML = this.value;
}
</script>

<?php
}
else{
    header("Location:../log_in.php");
    exit();

}
?>