<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin')){
    header('Location: login.php');
    exit();
  }
  Session::set('depositupdatemsg', '');

  $userobj    = new User();
  $costobj    = new Cost();

  $total_cost = $costobj->getCosts();
  $costs = $costobj->getCostsTable();


  view('cost-list', array(
    'userobj'   => $userobj,
    'costs'     => $costs,
    'totalcost' => $total_cost['total_cost']
  ));
