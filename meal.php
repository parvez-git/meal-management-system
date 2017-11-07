<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin') || Session::get('userroleid') == '0'){
    header('Location: login.php');
    exit();
  }
  if(Session::get('userroleid') == '1'){
    header('Location: meal-list.php');
    exit();
  }

  $userobj = new User();
  $mealobj = new Meal();
  $members = $userobj->getUsers();

  $data = array();

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deposit']) ) {

    $meal_nums = $_POST['meal'];

    if(empty($meal_nums)){

      $data['status'] = '<p class="alert alert-warning">Field must not be empty!</p>';

    }else{

      $meal_date = date('Y-m-d');
      $checkDate = $mealobj->getMealByDate($meal_date);

      if ($checkDate == false) {

        $insert = $mealobj->insertMealArr($meal_nums, $meal_date);

        if ($insert) {

          $data['status'] = '<p class="alert alert-success">You have added meals on '.$meal_date.'. <span class="crossbtn float-right text-danger">&times;</span></p>';
        }else{

          $data['status'] = '<p class="alert alert-warning">Error: Problem in inserting data! <span class="crossbtn float-right text-danger">&times;</span></p>';
        }

      }else{
        $data['status'] = '<p class="alert alert-warning">Meal already added for '.$meal_date.'! <span class="crossbtn float-right text-danger">&times;</span></p>';
      }

    }

  }


  view('meal', array(
    'status'  => $data,
    'members' => $members
  ));
