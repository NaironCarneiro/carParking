<?php

if(!empty($_GET['id'])){

    require_once('../../service/connect.php');

    $id = $_GET['id'];

    
    $sql_edit = mysqli_query($start, "SELECT * FROM tbl_register  WHERE id=$id");
    
    if($sql_edit->num_rows > 0){

        $sql_delete = mysqli_query($start, "DELETE FROM tbl_register  WHERE id=$id");

    }    
    if($sql_delete == true){
        echo " <script> 
            alert('O Veículo foi excluido');
            window.location.href='../main/main.php'
        </script>";
    } else{
        echo " <script> 
            alert('Não foi possível excluir o veículo, tente novamente');
            window.location.href='main/main.php'
        </script>";
    
    }
}else{
  header('Location: ../main/main.php');
}

?>