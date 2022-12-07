<?php

require_once('../../service/connect.php');

$brandCar = $_POST['brand_car'];
$ownerName = $_POST['owner_name'];
$phoneOwner = $_POST['phone_owner'];
$entryTime = $_POST['entry_time'];
$departureTime = $_POST['departure_time']; 
$licensePlate = $_POST['license_plate'];


$sql_register = mysqli_query($start, "INSERT INTO register_cars 
(`brand/model_car`,
`owner_name`,
`phone_owner`,
`entry_time`,
`departure_time`,
`license_plate`
) VALUES ('$brandCar','$ownerName', '$phoneOwner', '$entryTime','$departureTime', 
'$licensePlate') ");


if($sql_register == true){
    echo " <script> 
        alert('Veículo cadastrado com sucesso');
        window.location.href='../main/main.php'
    </script>";
} else{
    echo " <script> 
        alert('Não foi possível cadastrar o veículo, preencha todos os dados e tente novamente');
        window.location.href='register/register.html'
    </script>";

}

?>