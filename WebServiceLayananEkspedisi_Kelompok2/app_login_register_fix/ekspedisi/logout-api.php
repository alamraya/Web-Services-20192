<?php

if (isset($_POST['logout'])) {
    setcookie("token", '', time() - 3600, '/');
    setcookie('jwt', '', time() - 3600, '/');


    header('location: home-index.php');
}
