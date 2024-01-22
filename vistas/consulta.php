<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/style.css">
    <title>Document</title>
</head>

<body>
    <h1>Consultar</h1>
    <form action="http://localhost/prueba-tecnica-hotel/assets/handler.php" method="POST">
        <div class="mb-3">
            <input type="hidden" name="id" value="<?php  ?>">
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="habitaciones">
                <option value="">Seleccionar</option>
                <option value="1">Habitacion 1</option>
                <option value="2">Habitacion 2</option>
                <option value="3">Habitacion 3</option>
                <option value="4">Habitacion 4</option>
                <option value="5">Habitacion 5</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Fecha de checkin</label>
            <input name="checkin" type="date" class="form-control" id="exampleInputPassword1" value="<?php ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">fecha de checkout</label>
            <input name="checkout" type="date" class="form-control" id="exampleInputPassword1" value="<?php ?>">
        </div>

        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>
    <br>

    <a class="btn btn-secondary" href="http://localhost/prueba-tecnica-hotel/vistas/cantidadReserva.php" role="button">Usuarios con Reservas</a>
    <br>
    <br>
    <a class="btn btn-info" href="http://localhost/prueba-tecnica-hotel/vistas/formReserva.php" role="button">Nueva Reserva</a>
</body>

</html>