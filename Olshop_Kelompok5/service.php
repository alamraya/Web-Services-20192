<?php
$dbh = new PDO('mysql:host=localhost;dbname=ecommerce','root','');

$db = $dbh->prepare('SELECT * FROM products');
$db->execute();
$array = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($array);
echo $data;
?>