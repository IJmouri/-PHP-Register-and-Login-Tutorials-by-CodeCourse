<?php
session_start();

require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';

if(logged_in() === true){
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'username','password', 'email', 'firstname', 'lastname', 'active');

    if(user_active($user_data['username']) != 1){
        session_destroy();
        header('Location:index.php');
    }
}

$errors = array();
?>