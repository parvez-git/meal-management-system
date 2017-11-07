<?php
require 'functions.php';

if ( isset($_GET['action']) && ($_GET['action'] == 'logout') ) {

  Session::init();
  Session::destroy();
  header('Location: login.php');
  exit();
}
