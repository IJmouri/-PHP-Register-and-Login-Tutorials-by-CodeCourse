<?php

function activate($email, $email_code){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    $email = mysqli_real_escape_string($link,$email);
    $email_code = mysqli_real_escape_string($link,$email_code);

    $match = mysqli_fetch_array(mysqli_query($link, "SELECT COUNT(`user_id`) FROM `user` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = 0"));
    if($match[0] == 1)
    {
        $query = mysqli_query($link, "UPDATE `user` SET `active` = 1 WHERE `email` = '$email'");
        return true;
    }else{
        return false;
    }
}

function change_password($user_id, $password){
    $user_id = (int)$user_id;
    $password = md5($password);
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    $query = mysqli_query($link, "UPDATE `user` SET `password` = '$password' WHERE `user_id` = '$user_id' ");
    
}

function register_user($register_data){
    $link = mysqli_connect('localhost', 'root', '', 'a_database1');

    array_walk($register_data, 'array_sanitize');
    $register_data['password'] = md5($register_data['password']);

    $fields = '`'. implode('`, `', array_keys($register_data)) . '`';
    $data = '\''. implode('\', \'', $register_data) . '\'';

    $query = mysqli_query($link, "INSERT INTO user ($fields) VALUES ($data)");
    email($register_data['email'], 'Activate your account', "Hello " . $register_data['firstname'].",\n\n You need to activate your account,use the link below:\n\nhttp://localhost/rankmylist_task/PHP%20Register%20and%20Login%20Tutorials%20by%20CodeCourse/PHP%20Tutorials%20Register%20&%20Login%20(Part%2014)%20Email%20Activation%20(Part%202)/activate.php?email=".$register_data['email']."&email_code=".$register_data['email_code']);
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
