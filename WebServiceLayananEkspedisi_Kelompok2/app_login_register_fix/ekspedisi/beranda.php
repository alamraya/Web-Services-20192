<?php
if (!isset($_COOKIE['token'])) {
    header('location: home-index.php');
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
                <a class="nav-item nav-link active" href="account.php">My Account<span class="sr-only">(current)</span></a>
                    <form action="logout-api.php" method="post">
                        <input type="hidden" name="token" value="">
                        <button type="submit" value="logout" name="logout" class="btn btn-primary tombol">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Akhir Navbar -->

    <!-- beranda -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Welcome to the expedition service!!!</h1>
            <p class="lead">Lakukan Sesuatu Yang Produktif Dengan #Dirumahaja</p>
        </div>
    </div>

    <!-- last beranda -->

    <!-- container -->
    <div class="container">
        <!-- Fitur -->
        <div class="row justify-content-center">
            <div class="col-10 info-fitur justify-content-center d-flex">
                <div class="row">
                    <div class="col-lg">
                        <img src="img/online-store.png" alt="online-store" />
                        <a href="outlet.php">
                            <h4>Order</h4>
                        </a>
                    </div>
                    <div class="col-lg">
                        <img src="img/inspection.png" alt="inspection" />
                        <a href="ongkir.php">
                            <h4>Cek Ongkir</h4>
                        </a>
                    </div>
                    <div class="col-lg">
                        <img src="img/maps.png" alt="inspection" />
                        <a href="maps.php">
                            <h4>Maps</h4>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- last fitur -->

        <!-- Workingspace -->

        <div class="row work">
            <div class="col-lg-5">
                <img src="img/Teamwork Of Graphic Designers.jpg" alt="Teamwork" class="img-fluid" />
            </div>
            <div class="col-lg-6">
                <h3>
                    Do your <span>Activity</span> and <span>stay</span> at
                    <span>home</span>
                </h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi
                    eligendi recusandae culpa adipisci libero ab cumque commodi
                    accusamus perspiciatis asperiores?
                </p>
                <a href="" class="btn btn-primary tombol">Klik Disini</a>
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


    </div>
    </section>
    <!-- last team -->
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