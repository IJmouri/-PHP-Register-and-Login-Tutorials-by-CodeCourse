<?php include 'core/init.php'; 
logged_in_redirect();
include 'includes/overall/header.php'; 
if(isset($_GET['email'],$_GET['email_code']) === true){
    $email = trim($_GET['email']);
    $email_code = trim($_GET['email_code']);

    if(email_exists($email) === false){
        $errors[] = 'Oops, something went wrong, and we could not find your mail.';

    }else if(activate($email, $email_code) === false){
        $errors[] = 'we had problems activating your account';
    }
}else{
    header('Location: index.php');
    exit();
}

include 'includes/overall/footer.php'; 

?>