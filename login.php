<?php
  include 'functions.php';

  Session::init();
  if(Session::check('userlogin')){
    header('Location: index.php');
    exit();
  }

  $user = new User();

  $data = array();

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) ) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){

      $data['status'] = '<p class="alert alert-warning">Field must not be empty!</p>';

    }else{

      $checkUser = $user->checkUsername($username);

      if($checkUser){

        $userLogin = $user->loginUser($username, $password);

        if ($userLogin) {
          Session::init();
          Session::set('userlogin', true);
          Session::set('userid', $userLogin['id']);
          Session::set('userfullname', $userLogin['name']);
          Session::set('userroleid', $userLogin['role_id']);

          header('Location: index.php');
          exit();

        }else{

          $data['status'] = '<p class="alert alert-warning">Password does not match!</p>';
        }
      }else{
        $data['status'] = '<p class="alert alert-warning">Username does not exists!</p>';
      }

    }

  }

  view('login', $data);
