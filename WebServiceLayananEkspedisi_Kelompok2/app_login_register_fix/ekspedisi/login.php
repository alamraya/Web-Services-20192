<?php
//session_start();
//include_once('db_connect.php');
//$database = new database();

if (isset($_COOKIE['token'])  || isset($_COOKIE['jwt'])) {
  header('location: beranda.php');
}

// if (isset($_SESSION['is_login'])) {
//   header('location:');
// }

// if (isset($_COOKIE['username'])) {
//   $database->relogin($_COOKIE['username']);
//   header('location:');
// }

// if (isset($_POST['login'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//   if (isset($_POST['remember'])) {
//     $remember = TRUE;
//   } else {
//     $remember = FALSE;
//   }

//   if ($database->login($username, $password, $remember)) {
//     header('location:');
//   }
// }
?>
<!doctype html>
<html lang="en">

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
  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Login Form</title>
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
  <link href="assets/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" method="post" action="login-api.php">
    <img class="mb-4" src="assets/assets/css/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="email" class="sr-only">Email</label>
    <input type="email" id="email" class="form-control" placeholder="Email" name="email" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" value="login" name="login" class="btn btn-lg btn-success btn-block">Sign In</button>
    <a href="register.php" class="btn btn-lg btn-success btn-block">Register</a>
    <p class="mt-5 mb-3 text-muted">2020 &copy; Kelompok 2 Web Service</p>
  </form>
</body>

</html>