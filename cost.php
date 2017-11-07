<?php
  include 'functions.php';

  Session::init();
  if(!Session::check('userlogin') || Session::get('userroleid') == '0'){
    header('Location: login.php');
    exit();
  }
  if(Session::get('userroleid') == '1'){
    header('Location: cost-list.php');
    exit();
  }

  $userobj = new User();
  $costobj = new Cost();
  $members = $userobj->getUsers();

  $data = array();

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cost']) ) {

    $member_id = $_POST['member_id'];
    $cost      = $_POST['meal_cost'];
    $comments  = $_POST['comments'];
    $cost_date = date('Y-m-d');

    if(empty($member_id) || ($member_id == 0) || empty($cost)){

      $data['status'] = '<p class="alert alert-warning">Field must not be empty!<span class="float-right text-danger">&times;</span></p>';

    }else{

      $insert = $costobj->insertCost($cost, $member_id, $comments, $cost_date);

      if ($insert) {

        $data['status'] = '<p class="alert alert-success">You have added cost on '.$cost_date.'.<span class="float-right text-danger">&times;</span></p>';
      }else{

        $data['status'] = '<p class="alert alert-warning">Error: Problem in inserting data!<span class="float-right text-danger">&times;</span></p>';
      }


    }

  }


  view('cost', array(
    'status'  => $data,
    'members' => $members
  ));
