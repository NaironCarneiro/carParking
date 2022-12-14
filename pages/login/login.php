<?php
require_once('../../service/connect.php');

$user_email = $_POST['email_user'];
$user_password = $_POST['password_user'];

$login_user = mysqli_query($start, "SELECT * FROM tbl_user WHERE email = '$user_email' AND password = '$user_password'");

var_dump($user_email);


if(mysqli_num_rows($login_user)!=0){
    header('location:../main/main.php');
} else {
    echo " <script> 
        alert('O usuário não possui cadastro');
        window.location.href='login.html'
    </script>";
}

?>