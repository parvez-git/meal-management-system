<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin') || Session::get('userroleid') == '0'){
    header('Location: login.php');
    exit();
  }

  $userobj    = new User();
  $depositobj = new Deposit();
  $users      = $userobj->getUsers();


  if(isset($_GET['id']) && $_GET['id'] != ''){

    $depositid  = (int)$_GET['id'];
    $deposit    = $depositobj->getDepositById($depositid);

  }else{
    header('Location: deposit-list.php');
    exit();
  }

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['depositupdate']) ) {

    $member_id  = $_POST['member_id'];
    $amount     = $_POST['amount'];
    $comments   = $_POST['comments'];

    if(empty($member_id) || empty($amount)){

      Session::set('depositupdatemsg', '<p class="alert alert-warning">Field must not be empty! <span class="crossbtn float-right text-danger">&times;</span></p>');

    }else{

      $update = $depositobj->updateDeposit($member_id, $amount, $comments, $depositid);

      if ($update) {

        Session::set('depositupdatemsg', '<p class="alert alert-success">You have updated deposit successfull. <span class="crossbtn float-right text-danger">&times;</span></p>');
        header("Location: edit-deposit.php?id=$depositid");

      }else{
        Session::set('depositupdatemsg', '<p class="alert alert-warning">Error: Problem in updating data!. <span class="crossbtn float-right text-danger">&times;</span></p>');
      }
    }

  }

  view('edit-deposit', array(
    'members' => $users,
    'deposit' => $deposit,
  ));
