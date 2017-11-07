<?php
  include 'functions.php';


  $user = new User();

  $data = array();

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registration']) ) {

    $name     = $_POST['name'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    if(empty($name) || empty($username) || empty($email) || empty($password)){

      $data['status'] = '<p class="alert alert-warning">Field must not be empty!</p>';

    }else{

      $checkUser = $user->checkEmail($email);

      if($checkUser == false){

        $userReg = $user->insertUser($name, $username, $email, $password);

        if ($userReg) {

          header('Location: login.php');
          exit();

        }else{

          $data['status'] = '<p class="alert alert-warning">Error: Problem in registration!</p>';
        }
      }else{
        $data['status'] = '<p class="alert alert-warning">Email already exists!</p>';
      }

    }

  }


  view('registration', $data);
