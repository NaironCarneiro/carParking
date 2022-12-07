<?php
require_once('../../service/connect.php');

$user_email = $_POST['email_user'];
$user_password = $_POST['password_user'];

$login_user = mysqli_query($start, "SELECT * FROM user_register WHERE email_user='$user_email'
and password_user='$user_password' ");

if(mysqli_num_rows($login_user)!=0){
    header('location:../main/main.php');
} else {
    echo " <script> 
        alert('O usuário não possui cadastro');
        window.location.href='login.html'
    </script>";
}

?>