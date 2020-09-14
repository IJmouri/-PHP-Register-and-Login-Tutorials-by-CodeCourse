<?php
function register_user($register_data){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    array_walk($register_data, 'array_sanitize');
    $register_data['password'] = md5($register_data['password']);

    $fields = '`'. implode('`, `', array_keys($register_data)) . '`';
    $data = '\''. implode('\', \'', $register_data) . '\'';

    
}
function user_count(){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    $query = mysqli_query($link, "SELECT COUNT(`user_id`) FROM `user` WHERE `active` = 1");
    $data = mysqli_fetch_array($query);
    return $data[0];

}

function user_data($user_id){
    $data = array();
    $user_id = (int)$user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();
    if($func_num_args > 1){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

        unset($func_get_args[0]);

        $fields = '`'. implode('`, `', $func_get_args) . '`';
        $data = mysqli_fetch_assoc(mysqli_query($link,"SELECT $fields FROM `user` WHERE `user_id` = $user_id"));

        return $data;
    }
}

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
function email_exists($email){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    $email = sanitize($email);
    $query = mysqli_query($link, "SELECT COUNT(`user_id`) FROM `user` WHERE `email` = '$email'");
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
    $query = mysqli_query($link, "SELECT `user_id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'");
    $data = mysqli_fetch_array($query);
    
    return ($data[0] != 0 ? $data[0] : false );
    
}
