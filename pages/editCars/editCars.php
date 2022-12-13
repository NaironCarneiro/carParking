<?php

if (!empty($_GET['id'])) {

  require_once('../../service/connect.php');

  $id = $_GET['id'];


  $sql_edit = mysqli_query($start, "SELECT distinct tbl_register.id, tbl_user.name, tbl_user.email,tbl_owner.name, tbl_owner.telephone, 
  tbl_car.brand_model, tbl_car.license_plate, tbl_register.date, tbl_register.entry_time, tbl_register.departure_time 
   FROM tbl_user, tbl_owner, tbl_car, tbl_register  WHERE tbl_register.id=$id");

  if ($sql_edit->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($sql_edit)) {
      $brandCar = $user_data['brand_model'];
      $ownerName = $user_data['name'];
      $entryDate = $user_data['date'];
      $entryTime = $user_data['entry_time'];
      $departureTime = $user_data['departure_time'];
      $licensePlate = $user_data['license_plate'];
      $phoneOwner = $user_data['telephone'];
    }
  } else {
  }
} else {
  header('Location: ../main/main.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>

  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body class="body-style">

<div class="body-content">

  <div class="title"><span>Atualizar dados</span></div>

  <form method="post" action="saveEdit.php">

    <div class="container-main">
      <div class="container-input">
        <span class="title-input">Marca/Modelo:</span>
        <input type="text" name="brand_model" value="<?php echo $brandCar ?>" required />
      </div>
      <div class="container-input">
        <span class="title-input">Nome do Proprietário:</span>
        <input type="text" name="name" value="<?php echo $ownerName ?>" required />
      </div>
      <div class="container-input">
        
        <span class="title-input">Telefone:</span>
        <input type="text" name="telephone" value="<?php echo $phoneOwner ?>" required />
      </div>
      <div class="container-input">
        <span class="title-input">Placa:</span>
        <input type="text" name="license_plate" value="<?php echo $licensePlate ?>" required />
      </div>
      <div class="container-date">
              <span class="title-input">Data de chegada:</span>
              <input type="date" name="date" value="<?php echo $entryDate ?>" required/>
            </div>
      <div class="container-input">
        <span class="title-input">Horário de chegada:</span>
        <input type="text" name="entry_time" value="<?php echo $entryTime ?>" />
      </div>
      <div class="container-input">
        <span class="title-input">Horário de saída:</span>
        <input type="text" name="departure_time" value="<?php echo $departureTime ?>" required />
      </div>
      <div class="container-buttons">
        <div class="btn-register">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <button type="submit" name="update">Atualizar</button>
        </div>
        </form>
        <a href="http://localhost/crud_Parkingcar/pages/main/main.php">
        <div class="btn-cancel"><button>Cancelar</button></div>
        </a>
      </div>
    </div>

  </div>
  </div>
</body>

</html>