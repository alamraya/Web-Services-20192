<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
  require_once('dbconnect.php');



  session_start();
  $response = array();

  if ($_SERVER['REQUEST_METHOD']==='POST') {

    if(isset($_POST['name'],$_POST['email'],$_POST['password'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      if(!isAvailable($email)){
        signUp($name,$email,$password);
      }else{
        $response['error'] = true;
        $response['message'] = "this email is already used by another user";
      }


    }else{
      $response['error'] = true;
      $response['message'] = "some required feilds are missing";
    }


  }else {
     $response['error'] = true;
     $response['message'] = "You are not allowed to access this page :)";
  }

  function isAvailable($email){
    global $dbconnect;
    $querySql="select * from users where email='$email'";
    $result=$dbconnect->query($querySql);
    return ($result->num_rows>0) ;
  }

  function signUp($name,$email,$password){
    global $dbconnect,$response;

    // encrypt user password
    // $password = password_hash($password,PASSWORD_BCRYPT);

    // create random token with 32 character
    $token = md5(rand(0,1000));

    $insertSql="insert into users (name,email,password,status,token)
    values ('$name','$email','$password','0','$token');";

    // case of successfully inserted
    if($dbconnect->query($insertSql) ) {
        $_SESSION['userId']=$email;
        $response['error'] = false;
        $response['message'] = "successfully created account";
        $response['id']=$dbconnect->insert_id;
        $response['name']=$name;
        $response['email']=$email;

    }

    // case of failure of inserting into DB
    else{
      $response['error'] = true;
      $response['message'] = "somethig went wrong please try again ".$insertSql;
    }
  }


  echo json_encode($response);
