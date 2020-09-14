<?php
include 'core/init.php';
protect_page();

include 'includes/overall/header.php'; 

if(empty($_POST) === false){
    $required_fields = array('firstname', 'lastname', 'email');
    foreach($_POST as $key => $value ){
        if(empty($value) && in_array($key, $required_fields) === true){
            $errors[] = 'All the fields are required';
            break 1;
        }
    }
    
}

?>
<h2>Settings</h2>
<form action="" method="post">
    <ul>
        <li>
            Firstname:<br>
            <input type="text" name="firstname" value="<?php echo $user_data['firstname'] ?>">
        </li>
        <li>
            Lastname:<br>
            <input type="text" name="lastname" value="<?php echo $user_data['firstname'] ?>">
        </li>
        <li>
            Email:<br>
            <input type="text" name="email" value="<?php echo $user_data['email'] ?>">
        </li>
        <li>
            <input type="submit" value="Update">
        </li>
    </ul>
</form>
<?php include 'includes/overall/footer.php'; ?>