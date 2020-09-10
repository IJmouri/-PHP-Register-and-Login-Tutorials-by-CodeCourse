<?php
include 'core/init.php';

if(empty($_POST) === false){
    echo $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) === true || empty($password) === true){
        $errors[] = 'You need to enter username and password';
    } else if ( user_exists($username) === false){
        $errors[] = 'We can not find the username. Have you registered?';
    }
}
?>