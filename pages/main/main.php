<?php
require_once('../../service/connect.php');

$list_result = mysqli_query($start, " SELECT distinct tbl_register.id,tbl_owner.name, tbl_owner.telephone, 
tbl_car.brand_model, tbl_car.license_plate, tbl_register.date, tbl_register.entry_time, tbl_register.departure_time 
 FROM tbl_owner, tbl_car, tbl_register WHERE tbl_register.tbl_car_id = tbl_car.id AND tbl_register.tbl_car_tbl_owner_id = tbl_owner.id");
 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lista de veículos</title>

    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body class="body-style">
    <div class="container">
        <div class="title"><span>Lista de Veículos Cadastrados</span></div>
        <div class="results">
        <div class="results-container">
            <table class="table_list">
                <thead>
                    <tr class="line_table">
                        <th scope="col">Código</th>
                        <th scope="col">Modelo/Marca</th>
                        <th scope="col">Nome do proprietário</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Data</th>
                        <th scope="col">Horário de entrada</th>
                        <th scope="col">Horário de saída</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>          

            <tbody class="body_table">
                <?php                
                while($user_data = mysqli_fetch_assoc($list_result)){
                    echo "<tr>";
                    echo "<td>".$user_data['id']."</td>";
                    echo "<td>".$user_data['brand_model']."</td>";
                    echo "<td>".$user_data['name']."</td>";
                    echo "<td>".$user_data['telephone']."</td>";                    
                    echo "<td>".$user_data['license_plate']."</td>";
                    echo "<td>".$user_data['date']."</td>";
                    echo "<td>".$user_data['entry_time']."</td>";
                    echo "<td>".$user_data['departure_time']."</td>";
                    echo "<td>                    
                        <a href='../editCars/editCars.php?id=$user_data[id]'> 
                            <img class='img_edit' src='../../assets/images/edit.png' alt='usuário'>
                        </a>
                        <a href='../deleteCars/deleteCars.php?id=$user_data[id]'> 
                            <img class='img_delete' src='../../assets/images/delete.png' alt='usuário'>
                        </a>
                    </td>";
                    echo "<tr>";
                    
                }
                ?>
            </tbody>

            </table>

        </div>
        </div>

        <div class="container-buttons">
            <a href="http://localhost/pages/search/search.html">
                <div class="btn-report">
                    <button>Gerar relatório</button>
                </div>
            </a>
            <a href="http://localhost/crud_Parkingcar/pages/register/register.html">
                <div class="btn-car-register">
                    <button>Registrar</button>
                </div>
            </a>
            <a href="http://localhost/crud_Parkingcar/pages/login/login.html">
                <div class="btn-exit">            
                    <button>Sair</button>
                </div>
            </a>
        </div>
    </div>

</body>

</html>