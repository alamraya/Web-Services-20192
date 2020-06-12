<?php 
// koneksi database
include 'db.php';
 
// menangkap data yang di kirim dari form
$product_id = $_POST['product_id'];
$product_title = $_POST['product_title'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_desc'];
$product_image = $_POST['product_image'];
$product_cat = $_POST['product_cat'];
$product_brand $_POST['product_brand'];
$product_keywords $_POST['product_keywords'];
// update data ke database
mysqli_query($koneksi,"update products set product_title='$product_title', product_price='$product_price', product_desc='$product_desc', product_image='$product_image', $product_cat='product_cat', $product_brand='product_brand', $product_keywords='product_keywords'  where product_id='$product_id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>








