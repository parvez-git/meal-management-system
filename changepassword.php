<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin') || Session::get('userroleid') == '0'){
    header('Location: login.php');
    exit();
  }

  $userobj = new User();

  if(isset($_GET['id']) && $_GET['id'] != ''){

    $userid  = (int)$_GET['id'];
    $user    = $userobj->getUserById($userid);

  }else{
    header('Location: index.php');
    exit();
  }

  if(Session::get('userroleid') != $user['role_id']){
    header('Location: index.php');
    exit();
  }

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepassword']) ) {

    $oldpassword  = $_POST['oldpassword'];
    $password     = $_POST['password'];
    $email        = $_POST['email'];

    // vd($user['password']);

    if(empty($oldpassword) || empty($password) || empty($email)){

      Session::set('depositupdatemsg', '<p class="alert alert-warning">Field must not be empty! <span class="crossbtn float-right text-danger">&times;</span></p>');
    }else{

      $userpassupdate = $userobj->userPasswordUpdate($email, $password, $oldpassword, $userid);

      if($userpassupdate){

        Session::set('depositupdatemsg', '<p class="alert alert-success">Password change successfull. <span class="crossbtn float-right text-danger">&times;</span></p>');

      }else{
        Session::set('depositupdatemsg', '<p class="alert alert-warning">Old Password does not match! <span class="crossbtn float-right text-danger">&times;</span></p>');

      }
    }

  }


  view('changepassword', array(
    'user'       => $user,
  ));
