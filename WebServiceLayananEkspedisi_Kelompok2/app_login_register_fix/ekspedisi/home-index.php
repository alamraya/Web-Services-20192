<?php
if (isset($_COOKIE['token'])  || isset($_COOKIE['jwt'])) {
  header('location: beranda.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <!-- My Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />
  <!-- My css -->
  <link rel="stylesheet" href="style.css" />

  <title>Ekspedisi</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">Ekspedisi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="ongkir.php">Cek Ongkir<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="maps.php">Maps</a>

          <a class="btn btn-primary tombol" href="login.php">Log In</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Akhir Navbar -->

  <!-- beranda -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Make Easy Your Daily Activity</h1>
      <p class="lead">Lakukan Sesuatu yang Produktif dengan #Dirumahaja</p>
    </div>
  </div>

  <!-- last beranda -->


  <!-- last fitur -->

  <!-- Workingspace -->

  <div class="row work">
    <div class="col-lg-5">
      <img src="img/Teamwork Of Graphic Designers.jpg" alt="Teamwork" class="img-fluid" />
    </div>
    <div class="col-lg-6">
      <h3>
        Layanan Ekspedisi
      </h3>
      <p>
        Jasa pengiriman barang atau jasa ekspedisi semakin hari semakin banyak diminati oleh banyak masyarakat Indonesia, terutama dalam perkembangan pasar daring atau online market. Semakin berkembangnya teknologi juga mempengaruhi pesatnya kebutuhan dalam dunia e-commerce. Kini semakin banyak toko online yang menyediakan beragam kebutuhan sehari-hari dengan beragam jenis dengan harga yang beragam pula. Tidak hanya itu, beragam diskon maupun promo juga menjadi nilai tambah dalam berkembangnya pasar online sehingga semakin banyak orang yang menggeluti dunia ini.
      </p>

    </div>
  </div>
  <!-- Last Workingspace -->

  <!-- team -->
  <section class="team">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h5>
          "Tidak Cukup Menjadi Orang Biasa Maka Jadilah Orang Yang Luar
          Biasa"
        </h5>
      </div>
    </div>


    <!-- Akhir Container -->

    <!-- footer -->
    <div class="row footer">
      <div class="col text-center">
        <p>2020 All Rights Reserved by Kelompok 2.</p>
      </div>
    </div>
    <!-- Akhir footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>