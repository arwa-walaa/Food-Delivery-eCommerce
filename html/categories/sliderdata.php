<?php
$q = intval($_GET['q']);

include 'Connect.php';
$query ="SELECT * FROM product WHERE Price =< '".$q."' &&";
$result=$conn ->query($query);

include 'productsList.php';
?>