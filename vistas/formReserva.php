<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<h1>Registrar nuevo Cliente</h1>
    <form action="../assets/insert.php" method="POST">
       
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nombre y apellido</label>
            <input name="nombreyape" type="text" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">telefono</label>
            <input name="telefono" type="text" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">correo</label>
            <input name="correo" type="email" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="registro_habitaciones">
                <option selected>Seleccionar Habitacion</option>
                <option value="1">Habitacion 1</option>
                <option value="2">Habitacion 2</option>
                <option value="3">Habitacion 3</option>
                <option value="4">Habitacion 4</option>
                <option value="5">Habitacion 5</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">precio</label>
            <input name="precio" type="number" class="form-control" id="exampleInputPassword1" >
        </div>
        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Fecha de checkin</label>
            <input name="check_in" type="date" class="form-control" id="exampleInputPassword1" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">fecha de checkout</label>
            <input name="check_out" type="date" class="form-control" id="exampleInputPassword1" >
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</body>
</html>