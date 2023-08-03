<?php
session_start();
    include '../Connect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rate = intval($_POST["rate"]);


    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rating</title>
    <?php include 'headTag.html';?>
    <link rel="stylesheet" href="../../css/rateingStyle.css">


    <script>
    function closeAd() {
        document.getElementById("ad").innerHTML = "";
    }
    </script>
</head>

<body>
    <!-- nav -->
    <?php if(isset($_SESSION["Email"]))
{
    include "..\LoginNavbar.php";
}
else
{
    include "..\UnLoginNavbar.php";
}?>
    <div class="container-fluid" id="categoryPage">
        <div class="row" style="margin-top:65px;">
            <!---------ads bar --------->

            <div class="col-sm-3">
                <div id="ad">
                    <div class="row">
                        <div class="col-sm-11">
                            <section class="card" st>
                                <div class="card-header" style="padding: 0px 8px 3px 0px;">
                                    <button type="button" class="close" onclick="closeAd()">&times;</button>
                                </div>
                                <div class="card-body" style="padding: 0px;">
                                    <a href="https://www.pepsi.com/"><img
                                            src="https://i.pinimg.com/736x/a8/a8/54/a8a8547a0644ca2f50ff7bfadbde991c--pepsi-cola-magazine-ads.jpg"
                                            style="width: 100%; border-radius: 3px;" alt="" /></a>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div id="ad">
                    <div class="row">
                        <div class="col-sm-11">
                            <section class="card">
                                <div class="card-header" style="padding: 0px 8px 3px 0px;">
                                    <button type="button" class="close" onclick="closeAd()">&times;</button>
                                </div>
                                <div class="card-body" style="padding: 0px;">
                                    <a href="https://www.facebook.com/chipsyegypt/"><img
                                            src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/92c01010057677.560ded3482d99.jpg"
                                            style="width: 100%; border-radius: 3px;" alt="" width="100px" /></a>
                                </div>
                            </section>
                        </div>
                    </div>

                </div>
            </div>
            <!--------- main body --------->
            <div class="col-sm-8">
                <div class="row">
                    <h1>Rate our Products</h1>
                    <p>We would appreciate if you take a few minutes of your precious time to give us feedback about our
                        products.
                        Please rate each product out of five.

                    </p>

                </div>
                <div class="row">
                    <section class="card" style="min-width: 100%; ">

                        <!-- card img -->
                        <div class="card flex-row">
                            <img class="card-img-left example-card-img-responsive" hight="170" width="170"
                                src="https://via.placeholder.com/250x220/FFB6C1/000000" />
                            <!-- rateing -->
                            <div class="card-body">

                                <h5>ProductName</h5>


                                <h6>SourceName</h6>

                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                                    <input type="radio" name="rate"
                                        <?php if (isset($rate) && $rate==1) echo "checked";?> value="1">1
                                    <input type="radio" name="rate"
                                        <?php if (isset($rate) && $rate==2) echo "checked";?> value="2">2
                                    <input type="radio" name="rate"
                                        <?php if (isset($rate) && $rate==3) echo "checked";?> value="3">3

                                    <input type="radio" name="rate"
                                        <?php if (isset($rate) && $rate==4) echo "checked";?> value="4">4
                                    <input type="radio" name="rate"
                                        <?php if (isset($rate) && $rate==5) echo "checked";?> value="5">5

                                    <br>

                                    <div class="float-right">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Skip</button>
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>

    </div>
    </div>

    <!-- footer -->
    <?php include '../footer.php';?>



</body>


</html>