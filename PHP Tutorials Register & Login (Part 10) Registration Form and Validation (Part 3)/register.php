<?php
include 'core/init.php'; 

include 'includes/overall/header.php'; 

if(empty($_POST) === false){
    $required_fields = array('username','password', 'password_again', 'firstname', 'lastname', 'email');
    foreach($_POST as $key => $value ){
        if(empty($value) && in_array($key, $required_fields) === true){
            $errors[] = 'All the fields are required';
            break 1;
        }
    }

    if(empty($errors) === true)
    {
        if( user_exists($_POST['username']) == 1) {
            $errors[] = 'Sorry, the username already taken';
        }
        if(preg_match("/\\s/",$_POST['username']) == true) {
            $errors[] = 'username should not have any space';
        }
        if(strlen($_POST['password']) < 6){
            $errors[] = 'Password must be at least 6 characters';
        }
        if($_POST['password'] != $_POST['password_again']){
            $errors[] = 'Password do not match';
        }
    }
}
print_r($errors);

?>

<h1>Register</h1>
<p>Just a template.</p>

<form action="" method="post">
    <ul>
        <li>
            Username:<br>
            <input type="text" name="username">
        </li>
        <li>
            Password:<br>
            <input type="password" name="password">
        </li>
        <li>
            Password again:<br>
            <input type="password" name="password_again">
        </li>
        <li>
            First name:<br>
            <input type="text" name="firstname">
        </li>
        <li>
            Last name:<br>
            <input type="text" name="lastname">
        </li>
        <li>
            Email:<br>
            <input type="text" name="email">
        </li>
        <li>
            <input type="submit" value="Register">
        </li>
        
    </ul>
</form>

<?php include 'includes/overall/footer.php'; ?>