<?php

include("../db.php");
$order_id=$_REQUEST['order_id'];

 
?>

<?php 

$query = mysqli_query($con,"SELECT * FROM orders_info");
$data = mysqli_fetch_array($query);

echo $data"$order_id";
?>