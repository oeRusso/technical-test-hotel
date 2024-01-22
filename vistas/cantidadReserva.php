<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Document</title>
</head>

<body>
  <table class="table">
    <thead>
      <tr>

  
        <th scope="col">Nro de cuarto</th>
        <th scope="col">Precio</th>
        <th scope="col">Nombre y apellido</th>
        <th scope="col">Telefono</th>
        <th scope="col">Fecha checkin</th>
        <th scope="col">fecha de checkout</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once '../assets/hotel.php';

      $hotel = new hotel();
      $Costumers = $hotel->reservasActuales();
      foreach ($Costumers as $costumer) {

      ?>
        <tr>
          <td> <?php echo $costumer['numero_cuarto']  ?> </td>
          <td> <?php echo $costumer['precio'] ?> </td>
          <td> <?php echo $costumer['nombre_apellido']  ?> </td>
          <td> <?php echo $costumer['telefono']  ?> </td>
          <td> <?php echo $costumer['check_in']  ?> </td>
          <td> <?php echo $costumer['check_out']  ?> </td>


        </tr>

      <?php
      }
      ?>
     
    </tbody>
  </table>
  <a class="btn btn-warning" href="consulta.php" role="button">Volver</a>
</body>

</html>