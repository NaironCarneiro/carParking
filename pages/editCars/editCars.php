<?php

if (!empty($_GET['idregister_cars'])) {

  require_once('../../service/connect.php');

  $id = $_GET['idregister_cars'];


  $sql_edit = mysqli_query($start, "SELECT * FROM register_cars  WHERE idregister_cars=$id");

  if ($sql_edit->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($sql_edit)) {
      $brandCar = $user_data['brand/model_car'];
      $ownerName = $user_data['owner_name'];
      $entryTime = $user_data['entry_time'];
      $departureTime = $user_data['departure_time'];
      $licensePlate = $user_data['license_plate'];
      $phoneOwner = $user_data['phone_owner'];
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
        <input type="text" name="brand_car" value="<?php echo $brandCar ?>" required />
      </div>
      <div class="container-input">
        <span class="title-input">Nome do Proprietário:</span>
        <input type="text" name="owner_name" value="<?php echo $ownerName ?>" required />
      </div>
      <div class="container-input">
        <span class="title-input">Telefone:</span>
        <input type="text" name="phone_owner" value="<?php echo $phoneOwner ?>" required />
      </div>
      <div class="container-input">
        <span class="title-input">Placa:</span>
        <input type="text" name="license_plate" value="<?php echo $licensePlate ?>" required />
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
        <div class="btn-cancel"><button>Cancelar</button></div>
      </div>
    </div>


  </form>
  </div>
  </div>
</body>

</html>