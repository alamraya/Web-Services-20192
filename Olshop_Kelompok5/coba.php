<?php
$dbh = new PDO('mysql:host=localhost;dbname=ecommerce','root','');

$db = $dbh->prepare('SELECT * FROM orders_info');
$db->execute();
$array = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($array);
echo $data;
?>