<?php
// include_once('db_connect.php');
// $database = new database();
// if (isset($_POST['register'])) {
//   $username = $_POST['username'];
//   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//   $nama = $_POST['nama'];
//   if ($database->register($username, $password, $nama)) {
//     header('location:login.php');
//   }
// }

// 
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <!-- My Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet" />
  <!-- My css -->
  <link rel="stylesheet" href="style.css" />

  
  

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer/">

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Register Form</title>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="sticky-footer.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">Ekspedisi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          

          <a class="nav-item nav-link" href="beranda.php">Back</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Akhir Navbar -->
  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
      <h1 class="mt-5">Register Form</h1>
      <p class="lead">Silahkan Daftarkan Identitas Anda</p>
      <hr />
      <form method="post" action="register-api.php">

        <div class="form-group row">
          <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
          </div>
        </div>

        <div class="form-group row">
          <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
          </div>
        </div>

        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>
        </div>

        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <a href="login.php" class="btn btn-success">Login</a>
            <button type="submit" value="register" class="btn btn-primary" name="register">Register</button>
          </div>
        </div>
      </form>
    </div>
  </main>

   <!-- footer -->
   <div class="row footer">
      <div class="col text-center">
        <p>2020 All Rights Reserved by Kelompok 2.</p>
      </div>
    </div>
    <!-- Akhir footer -->
</body>

</html>