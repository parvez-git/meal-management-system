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

  $total_meal = $mealobj->getMeals();
  $total_cost = $costobj->getCosts();

  if ($total_cost['total_cost'] != null && $total_meal['total_meal'] != null) {
    $meal_rate = ( $total_cost['total_cost'] / $total_meal['total_meal'] );
  }else{
    $meal_rate = 0;
  }


  view('meal-list', array(
    'users'       => $users,
    'depositobj'  => $depositobj,
    'mealobj'     => $mealobj,
    'costobj'     => $costobj,
    'totalmeal'   => $total_meal['total_meal'],
    'totalcost'   => $total_cost['total_cost'],
    'meal_rate'   => $meal_rate,
    'meal_date'   => $meal_date
  ));
