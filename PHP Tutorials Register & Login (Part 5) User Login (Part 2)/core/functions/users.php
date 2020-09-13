<?php

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
