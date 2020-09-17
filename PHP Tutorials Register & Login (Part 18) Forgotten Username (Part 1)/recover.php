<?php include 'core/init.php'; ?>
<?php logged_in_redirect(); ?>

<?php include 'includes/overall/header.php'; ?>

<h1>Recover</h1>

<?php 
$mode_allowed = array('username','password');
if(isset($_GET['mode']) === true && in_array($_GET['mode'] , $mode_allowed) === true){
    if (isset($_POST['email']) ===true && empty($_POST['email']) === false) {
        if(email_exists($_POST['email']) == 1){
            recover($_GET['mode'],$_POST['email']);
        }else{
            echo '<p>We could not find that email address</p>';
        }
    }

?>

<form action="" method="post">
    <ul>
        <li>
            <input type="text" name="email">
        </li>
        <li>
            <input type="submit" value="Recover">
        </li>
    </ul>
</form>
<?php
}else{
    header('Location: index.php');
    exit();
}

include 'includes/overall/footer.php'; ?>