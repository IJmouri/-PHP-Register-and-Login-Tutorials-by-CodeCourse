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

    if(empty($errors) === true){
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
            $errors[] = 'Valid email required';
        }else if( email_exists($_POST['email']) == 1 && $user_data['email'] !== $_POST['email']) {
            $errors[] = 'Sorry, the email already taken';
        }

    }
    
}


?>
<h2>Settings</h2>
<?php
if(isset($_GET['success']) && empty($_GET['success'])){
    echo "Your profile updated successfully";
}else{
    if(empty($_POST) === false && empty($errors) === true){
        $allow_email = ( $_POST['allow_email'] == 'on') ? 1 : 0;
        $update_data = array(
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'allow_email' => $allow_email
        );
        update_user($session_user_id ,$update_data);
        header('Location: settings.php?success');
    }else{
        echo output_errors($errors);
    }
    ?>
    <form action="" method="post">
        <ul>
            <li>
                Firstname:<br>
                <input type="text" name="firstname" value="<?php echo $user_data['firstname'] ?>">
            </li>
            <li>
                Lastname:<br>
                <input type="text" name="lastname" value="<?php echo $user_data['lastname'] ?>">
            </li>
            <li>
                Email:<br>
                <input type="text" name="email" value="<?php echo $user_data['email'] ?>">
            </li>
            <li>
                <input type="checkbox" name="allow_email" <?php if($user_data['allow_email'] == 1) { echo 'checked="checked"' ;} ?>>Would you like to receive email from us?
            </li>
            <li>
                <input type="submit" value="Update">
            </li>
        </ul>
    </form>
<?php
}
?>

<?php include 'includes/overall/footer.php'; ?>