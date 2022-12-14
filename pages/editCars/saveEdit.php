<?php

require_once('../../service/connect.php');

if(isset($_POST['update'])){
        $id = $_POST['id'];
        $brandCar = $_POST['brand_model'];
        $ownerName = $_POST['name'];
        $entryDate = $_POST['date'];
        $entryTime = $_POST['entry_time'];
        $departureTime = $_POST['departure_time'];
        $licensePlate = $_POST['license_plate'];
        $phoneOwner = $_POST['telephone'];

    $sql_update = mysqli_query($start, "UPDATE tbl_user, tbl_owner, tbl_car, tbl_register SET 
    tbl_owner.name='$ownerName', tbl_owner.telephone='$phoneOwner', tbl_car.brand_model='$brandCar',
     tbl_car.license_plate='$licensePlate', tbl_register.date='$entryDate',
         tbl_register.entry_time='$entryTime', tbl_register.departure_time='$departureTime'  WHERE tbl_register.id = '$id'");

    }

    if($sql_update == true){
        echo " <script> 
            alert('Dados do Veículo atualizados');
            window.location.href='../main/main.php'
        </script>";
    }
     else{
        echo " <script> 
            alert('Não foi possível atualizar os dados do veículo, tente novamente');
            window.location.href='../editCars/editCars.php'
        </script>";
    }
?>