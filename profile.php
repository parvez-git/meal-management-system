<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin') || Session::get('userroleid') == '0'){
    header('Location: login.php');
    exit();
  }

  $userobj    = new User();
  $depositobj = new Deposit();
  $mealobj    = new Meal();
  $costobj    = new Cost();

  if(isset($_GET['id']) && $_GET['id'] != ''){

    $memberid     = (int)$_GET['id'];
    $user         = $userobj->getUserById($memberid);
    $deposit      = $depositobj->getDepositAmountsById($memberid);
    $member_meal  = $mealobj->getMealByMember($memberid);
    $total_meal   = $mealobj->getMeals();
    $single_cost  = $costobj->getCostByMember($memberid);
    $total_cost   = $costobj->getCosts();

    if ($total_cost['total_cost'] != null && $total_meal['total_meal'] != null) {
      $meal_rate = ( $total_cost['total_cost'] / $total_meal['total_meal'] );
    }else{
      $meal_rate = 0;
    }
    $member_cost  = ( $member_meal['member_meal'] * $meal_rate );
    $plusminus    = ( $deposit['amounts'] - $member_cost );

  }else{
    header('Location: index.php');
    exit();
  }

  view('profile', array(
    'user'        => $user,
    'deposit'     => $deposit,
    'member_meal' => $member_meal,
    'total_meal'  => $total_meal,
    'single_cost' => $single_cost,
    'total_cost'  => $total_cost,
    'meal_rate'   => $meal_rate,
    'member_cost' => $member_cost,
    'plusminus'   => $plusminus
  ));
