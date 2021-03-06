<?php include 'core/init.php'; ?>
<?php protect_page(); ?>

<?php

if(empty($_POST) === false){
    $required_fields = array('current_password', 'password', 'password_again');
    foreach($_POST as $key => $value ){
        if(empty($value) && in_array($key, $required_fields) === true){
            $errors[] = 'All the fields are required';
            break 1;
        }
    }
    
    if(empty($errors) === true)
    {
        if(md5($_POST['current_password']) === $user_data['password'] ){
            if(trim($_POST['password']) != trim($_POST['password_again'])){
                $errors[] = 'Password do not match';
            }else if(strlen($_POST['password']) < 6){
                $errors[] = 'Password must be at least 6 characters';
            }
        }else{
            $errors[] = 'Current Password is incorrect';
        }
    }
}

?>
<?php include 'includes/overall/header.php'; ?>

<h1>Change</h1>

<form action="" method="post">
    <ul>
        <li>
            Current Password*:<br>
            <input type="text" name="current_password" />
        </li>
        <li>
            New Password*:<br>
            <input type="text" name="password" />
        </li>
        <li>
            New Password Again*:<br>
            <input type="text" name="password_again" />
        </li>
        <li>
            <input type="submit" value="Change">
        </li>
    </ul>
</form>
<?php include 'includes/overall/footer.php'; ?>