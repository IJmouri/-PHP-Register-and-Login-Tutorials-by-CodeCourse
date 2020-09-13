<aside id="Just_A_Random_ID">

<?php 
if(logged_in() === true){
    include 'includes/widgets/loggedin.php'; 
}else{
    include 'includes/widgets/login.php'; 
}
?>
</aside>