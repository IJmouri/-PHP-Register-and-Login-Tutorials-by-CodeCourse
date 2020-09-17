<?php
session_start();

require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';

$current_file = basename(__FILE__);

if(logged_in() === true){
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'username','password', 'email', 'firstname', 'lastname', 'active');

    if(user_active($user_data['username']) != 1){
        session_destroy();
        header('Location:index.php');
    }
    if(1==1){
        header('Location:changePassword.php');

    }
}

$errors = array();
?>