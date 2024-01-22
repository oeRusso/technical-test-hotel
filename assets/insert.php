<?php

require 'hotel.php';


if (count($_POST) > 0) {
  

    $nombreyape =  $_POST['nombreyape'];
    $telefono = $_POST['telefono'];
    $correo =  $_POST['correo'];
    $r_habitaciones =$_POST['registro_habitaciones'];
    $precio = $_POST['precio'];
    $check_in = $_POST['check_in'] ;
    $check_out =  $_POST['check_out']; //mañana ver q onda esto si los podes solo asignar los datos q llean por post


    $nuevoRegistro = new Hotel();
    $registroGuardado = $nuevoRegistro->nuevaReserva($nombreyape, $telefono, $correo, $r_habitaciones, $precio, $check_in, $check_out);
    print_r($registroGuardado);

  
}
