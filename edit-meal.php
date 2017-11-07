<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin') || Session::get('userroleid') == '0'){
    header('Location: login.php');
    exit();
  }

  $userobj = new User();
  $mealobj = new Meal();
  $members = $userobj->getUsers();


  if(isset($_GET['id']) && $_GET['id'] != ''){

    $meal_id  = $_GET['id'];
    $meal     = $mealobj->getMealById($meal_id);

  }else{
    header('Location: meal-list.php');
    exit();
  }

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['mealupdate']) ) {

    $meal_num = $_POST['meal_num'];

    if($meal_num < 0){

      Session::set('depositupdatemsg', '<p class="alert alert-warning">Field must not be empty! <span class="crossbtn float-right text-danger">&times;</span></p>');

    }else{

        $update = $mealobj->updateMeal($meal_num, $meal_id);

        if ($update) {

          Session::set('depositupdatemsg', '<p class="alert alert-success">You have updated deposit successfull. <span class="crossbtn float-right text-danger">&times;</span></p>');
          header("Location: edit-meal.php?id=$meal_id");

        }else{

          Session::set('depositupdatemsg', '<p class="alert alert-warning">Error: Problem in updating data!. <span class="crossbtn float-right text-danger">&times;</span></p>');
        }

    }

  }


  view('edit-meal', array(
    'members' => $members,
    'meal'    => $meal
  ));
