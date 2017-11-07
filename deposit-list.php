<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin')){
    header('Location: login.php');
    exit();
  }
  Session::set('depositupdatemsg', '');

  $userobj    = new User();
  $depositobj = new Deposit();

  $deposits      = $depositobj->getDeposit();
  $total_deposit = $depositobj->getTotalDeposit();


  view('deposit-list', array(
    'userobj'       => $userobj,
    'deposits'      => $deposits,
    'totaldeposit'  => $total_deposit['total_amount']
  ));
