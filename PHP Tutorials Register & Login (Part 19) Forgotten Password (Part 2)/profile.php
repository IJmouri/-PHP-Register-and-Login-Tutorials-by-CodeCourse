<?php 
include 'core/init.php';
protect_page();

include 'includes/overall/header.php'; 

if(isset($_GET['username']) === true && empty($_GET['username']) === false){

    $username = $_GET['username'];
    if(user_exists($username) == 1){
        $user_id = user_id_from_username($username);

        $profile_data = user_data($user_id, 'firstname', 'lastname', 'email'); 
    ?>
    <h1><?php echo $profile_data['firstname'] ?>'s Profile</h1>
    <?php
    }else{
        echo 'Sorry,that user does not exist';
    }
}else{
    header('Location: index.php');
    exit();
}


include 'includes/overall/footer.php'; 

?>