<?php

require_once('../../service/connect.php');

$userName = $_POST['txt_name'];
$userEmail = $_POST['txt_email'];
$userPassword = $_POST['txt_password'];

$sql_register = mysqli_query($start, "INSERT INTO tbl_user 
(`name`,
`email`,
`password`) VALUES ('$userName','$userEmail','$userPassword') ");


if($sql_register == true){
    echo " <script> 
        alert('Usuário cadastrado com sucesso');
        window.location.href='../login/login.html'
    </script>";
} else{
    echo " <script> 
        alert('Falha no cadastro');
        window.location.href='registerUsers/registerUsers.html'
    </script>";

}

?>