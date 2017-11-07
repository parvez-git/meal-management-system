<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin') || Session::get('userroleid') == '0'){
    header('Location: login.php');
    exit();
  }

  $userobj = new User();
  $costobj = new Cost();
  $members = $userobj->getUsers();

  if(isset($_GET['id']) && $_GET['id'] != ''){

    $costid  = (int)$_GET['id'];
    $cost    = $costobj->getCostById($costid);

  }else{
    header('Location: cost-list.php');
    exit();
  }

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['costupdate']) ) {

    $member_id = $_POST['member_id'];
    $meal_cost = $_POST['meal_cost'];
    $comments  = $_POST['comments'];


    if(empty($member_id) || empty($cost)){

      Session::set('depositupdatemsg', '<p class="alert alert-warning">Field must not be empty! <span class="crossbtn float-right text-danger">&times;</span></p>');

    }else{

      $update = $costobj->updateCost($member_id, $meal_cost, $comments, $costid);

      if ($update) {

        Session::set('depositupdatemsg', '<p class="alert alert-success">You have updated cost successfull. <span class="crossbtn float-right text-danger">&times;</span></p>');
        header("Location: edit-cost.php?id=$costid");

      }else{
        Session::set('depositupdatemsg', '<p class="alert alert-warning">Error: Problem in updating data!. <span class="crossbtn float-right text-danger">&times;</span></p>');
      }


    }

  }


  view('edit-cost', array(
    'members' => $members,
    'cost'    => $cost
  ));
