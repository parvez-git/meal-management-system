<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin')){
    header('Location: login.php');
    exit();
  }
  Session::set('depositupdatemsg', '');


  $userobj  = new User();
  $users    = $userobj->getUsers();

  $depositobj = new Deposit();
  $mealobj    = new Meal();
  $costobj    = new Cost();

  $meal_date = $mealobj->getMealTable();

  $total_meal     = $mealobj->getMeals();
  $total_cost     = $costobj->getCosts();
  $total_deposit  = $depositobj->getTotalDeposit();

  if ($total_cost['total_cost'] != null && $total_meal['total_meal'] != null) {
    $meal_rate = ( $total_cost['total_cost'] / $total_meal['total_meal'] );
  }else{
    $meal_rate = 0;
  }

  if ($total_cost['total_cost'] != null && $total_deposit['total_amount'] != null) {
    $cash_on_hand = ( $total_deposit['total_amount'] - $total_cost['total_cost'] );
  }else{
    $cash_on_hand = 0;
  }


  view('index', array(
    'users'       => $users,
    'depositobj'  => $depositobj,
    'mealobj'     => $mealobj,
    'costobj'     => $costobj,
    'totalmeal'   => $total_meal['total_meal'],
    'totalcost'   => $total_cost['total_cost'],
    'meal_rate'   => $meal_rate,
    'meal_date'   => $meal_date,
    'cash_on_hand'=> $cash_on_hand
  ));
