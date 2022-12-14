<?php

require_once('../../service/connect.php');

    $brandCar = $_POST['brand_car'];
    $ownerName = $_POST['owner_name'];
    $phoneOwner = $_POST['phone_owner'];
    $entryDate = $_POST['entry_date'];
    $entryTime = $_POST['entry_time'];
    $departureTime = $_POST['departure_time'];
    $licensePlate = $_POST['license_plate'];


$sql_register_owner = mysqli_query($start, "INSERT INTO tbl_owner 
(`name`,
`telephone`) VALUES ('$ownerName', '$phoneOwner') ");

$id_owner = $start->insert_id;

$sql_register_car = mysqli_query($start, "INSERT INTO tbl_car
(`brand_model`, 
`license_plate`,
`tbl_owner_id`
) VALUES ('$brandCar','$licensePlate', '$id_owner') ");

$id_us = 1;

$id_car = $start->insert_id;

$sql_register_dateTime = mysqli_query($start, "INSERT INTO tbl_register
(`date`,
`entry_time`,
`departure_time`,
`tbl_user_id`,
`tbl_car_id`,
`tbl_car_tbl_owner_id`
 ) VALUES ('$entryDate','$entryTime','$departureTime', '$id_us', '$id_car', '$id_owner') ");


if($sql_register_dateTime && $sql_register_car && $sql_register_owner == true){
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