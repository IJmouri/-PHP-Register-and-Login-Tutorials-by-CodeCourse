<?php
session_start();

require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';
//echo logged_in();

if(logged_in() === true){
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'username','password', 'email', 'firstname', 'lastname', 'active');

}

$errors = array();
?>