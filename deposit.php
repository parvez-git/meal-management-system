<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin') || Session::get('userroleid') == '0'){
    header('Location: login.php');
    exit();
  }
  if(Session::get('userroleid') == '1'){
    header('Location: deposit-list.php');
    exit();
  }

  $userobj    = new User();
  $depositobj = new Deposit();
  $users      = $userobj->getUsers();

  $data = array();

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deposit']) ) {

    $member_id  = $_POST['member_id'];
    $amount     = $_POST['amount'];
    $comments   = $_POST['comments'];

    if(empty($member_id) || ($member_id == 0) || empty($amount)){

      $data['status'] = '<p class="alert alert-warning">Field must not be empty! <span class="crossbtn float-right text-danger">&times;</span></p>';

    }else{

      $insert = $depositobj->insertDeposit($member_id, $amount, $comments);

      if ($insert) {

        $data['status'] = '<p class="alert alert-success">You have deposited successfull. <span class="crossbtn float-right text-danger">&times;</span></p>';
      }else{

        $data['status'] = '<p class="alert alert-warning">Error: Problem in inserting data! <span class="crossbtn float-right text-danger">&times;</span></p>';
      }
    }

  }


  view('deposit', array(
    'status'  => $data,
    'members' => $users
  ));
