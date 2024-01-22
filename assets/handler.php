<?php

require '../vistas/consulta.php';
require 'hotel.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_METHOD'] > 1) {


    if (isset($_POST['habitaciones']) && $_POST['habitaciones'] !== '') {

        $habitacion = $_POST['habitaciones'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];

        $hotel = new Hotel();
        $disponible = $hotel->Reservar($habitacion, $checkin, $checkout);
    } else {
        echo "Debes seleccionar alguna habitación y fecha específica.";
    }
    die;
} else {
    echo "Método de solicitud no válido.";

}



