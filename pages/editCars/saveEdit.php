<?php

require_once('../../service/connect.php');

if(isset($_POST['update'])){
        $id = $_POST['id'];
        $brandCar = $_POST['brand_car'];
        $ownerName = $_POST['owner_name'];
        $entryTime = $_POST['entry_time'];
        $departureTime = $_POST['departure_time'];
        $licensePlate = $_POST['license_plate'];
        $phoneOwner = $_POST['phone_owner'];

        $sql_update = mysqli_query($start, "UPDATE register_cars SET `brand/model_car`='$brandCar',
        owner_name='$ownerName', phone_owner='$phoneOwner', license_plate='$licensePlate', 
        entry_time='$entryTime', departure_time='$departureTime' WHERE idregister_cars='$id'");

    }

    if($sql_update == true){
        echo " <script> 
            alert('Dados do Veículo atualizados');
            window.location.href='../main/main.php'
        </script>";
    } else{
        echo " <script> 
            alert('Não foi possível atualizar os dados do veículo, tente novamente');
            window.location.href='editCars/editCars.html'
        </script>";
    }
?>