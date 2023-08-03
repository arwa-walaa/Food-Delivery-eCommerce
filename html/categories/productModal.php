<?php

 if(isset($_SESSION["Email"]))
{

?>

<!-- The Modal -->

<div class="modal" id="productDetails">


<div class="modal-dialog">

    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">


            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->

        <div class="modal-body" id="productDetailsModal">

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <form action="test.php" method='POST'>
            <button class="btn btn-danger" name="AddtoCard">Add to cart</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</form>
        </div>

    </div>
</div>

</div>

<?php include 'productDetails.php';?>

<!--modale script-->
<script>
$('.adtocart').on('click', function() {
$('.modal-body').load('productDetails.php?id=2', function() {
    $('#productDetails').modal({
        show: true
    });
});
});
</script>

<?php
}
else{
    header("Location:../log_in.php");
    exit();

}
?>