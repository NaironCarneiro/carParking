<?php
    $host = 'localhost';
    $db   = 'car_parking';
    $user = 'root';
    $pass = 'admin';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try{
        $start = mysqli_connect($host, $user, $pass, $db);
    }catch (Exception $e){
        echo $e->getMessage();
        exit;
    }
?>