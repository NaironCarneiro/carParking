<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<br>
<br>
<h1>Relatorio</h1>

<?php
require_once "../../service/connect.php";
$sql = "SELECT COUNT(*) FROM tbl_register";
$result = mysqli_query($start, $sql);
$row = mysqli_fetch_row($result);
$count = $row[0];

echo "Total de veículos cadastrados: ";
echo $count;
?>

<h2> Registros </h2>

<?php
require_once "../../service/connect.php";

$list_result = mysqli_query($start, " SELECT distinct
                                        tbl_register.id,
                                        tbl_owner.name,
                                        tbl_owner.telephone,
                                        tbl_car.brand_model,
                                        tbl_car.license_plate,
                                        tbl_register.date,
                                        tbl_register.entry_time,
                                        tbl_register.departure_time 
                                        FROM
                                        tbl_owner,
                                        tbl_car,
                                        tbl_register 
                                        WHERE
                                        tbl_register.tbl_car_id = tbl_car.id 
                                        AND tbl_register.tbl_car_tbl_owner_id = tbl_owner.id");
 ?>


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
                echo "<tr>";
                
            }
            ?>
      </tbody>
   </table>
</div>

<?php
echo "<script>window.print()</script>";
?>