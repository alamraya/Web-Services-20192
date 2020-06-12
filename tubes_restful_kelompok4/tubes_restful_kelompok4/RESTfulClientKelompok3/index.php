<?php
include('functions.php');
$data = getData("http://localhost:8080/DapurBunda/api/json/get");
$herbs = json_decode($data, true);
$herbs = $herbs["data"];
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Dapur Bunda</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
                <a class="navbar-brand" href="#">Dapur Bunda</a>
            </div>
        </nav>

        <div class="container">
            <div class="row mt-3 justify-content-center">
                <h1 class="text-center text-success">Semua Produk</h1>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-md-8">
                    <a class="btn btn-success btn-sm" data-backdrop="static" data-keyboard="false"  href="#" data-toggle="modal" data-target="#addModal">Tambah Produk</a>
                    
                </div>
            </div>
            <?php if (isset($_GET['success'])){
                include_once('components/alert.php');
            }
            ?>
            <div class="row">
            <?php foreach ($herbs as $herb) : ?>
                <div class="col-md-3">
                    <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-header bg-transparent border-success text-success"><h5><?= $herb["nama"]; ?></h5></div>
                    <div class="card-body text-success">
                        <p class="card-text"><?= $herb["kategori"]; ?></p>
                        <strong class="card-title">Rp<?= $herb["harga"]; ?>/Kg</strong>
                    </div>
                    <div class="card-footer bg-transparent border-success text-center">
                    <a href="#" class="card-link btn btn-warning btn-sm" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#updateModal<?= $herb["id"]; ?>">Ubah</a>
                    <a href="#" class="card-link btn btn-danger btn-sm" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#deleteModal<?= $herb["id"]; ?>">Hapus</a>
                    </div>
                    </div>
                </div>
                <?php include('components/update-modal.php'); ?>
                <?php include('components/delete-modal.php'); ?>
            <?php endforeach; ?>
            </div>
        </div>
        
        <?php include('components/add-modal.php') ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>