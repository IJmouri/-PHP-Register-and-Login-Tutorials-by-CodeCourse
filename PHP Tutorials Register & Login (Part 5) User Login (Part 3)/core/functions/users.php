<?php

function logged_in(){
    return (isset($_SESSION['user_id']) ? true : false);
    
}

function user_exists($username){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    $username = sanitize($username);
    $query = mysqli_query($link, "SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username'");
    $data = mysqli_fetch_array($query);
    return $data[0];
}

function user_active($username){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    $username = sanitize($username);
    $query = mysqli_query($link, "SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username' AND `active` = 1");
    $data = mysqli_fetch_array($query);
    return $data[0];
}

function user_id_from_username($username){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    $username = sanitize($username);
    $query = mysqli_query($link, "SELECT `user_id` FROM `user` WHERE `username` = '$username'");
    $data = mysqli_fetch_array($query);
    return $data[0];
}

function login($username, $password){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    $user_id = user_id_from_username($username);
    $username = sanitize($username);
    $password = md5($password);
    $query = mysqli_query($link, "SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
    $data = mysqli_fetch_array($query);
    
    return $data[0];
}
