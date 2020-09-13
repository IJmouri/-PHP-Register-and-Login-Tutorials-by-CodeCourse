<?php
include 'core/init.php'; 

include 'includes/overall/header.php'; 

if(empty($_POST) === false){
    echo 's';
}

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