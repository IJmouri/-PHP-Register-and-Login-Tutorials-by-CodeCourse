<?php
session_start();

require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';
$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
$current_file = end($current_file);

if(logged_in() === true){
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'username','password', 'email', 'firstname', 'lastname', 'active', 'password_recover', 'type');

    if(user_active($user_data['username']) != 1){
        session_destroy();
        header('Location:index.php');
    }
    if($current_file !== 'changePassword.php' && $current_file !== 'logout.php' && $user_data['password_recover'] == 1){

        header('Location:changePassword.php?force');

    }
}

$errors = array();
?>