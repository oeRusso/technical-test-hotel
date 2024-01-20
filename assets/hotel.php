

<?php
include 'db.php';
class Hotel
{
   
    public  $obtenerReserva  = "";

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }



    public function verificarDisponibilidad($numero_cuarto, $checkin, $checkout)
    {
        $habitaciones = $this->habitacionDisponible($numero_cuarto, $checkin, $checkout);
        // foreach ($habitaciones as $habitacion) {
        //     echo $habitacion['numero_cuarto'];
        //     echo $habitacion['precio'];
        // } //esta parte del foreach la haces en al vista despues
    }


    private function habitacionDisponible($numero_cuarto, $checkin, $checkout)
    {
        $query = "SELECT COUNT(*) as cantidad_reservas,h.numero_cuarto,h.precio,r.check_in,check_out,c.nombre_apellido,c.telefono
                  FROM reservas r 
                  INNER JOIN habitaciones h ON r.habitacion_id = h.id_habitacion
                  INNER JOIN clientes c ON r.cliente_id = c.id_cliente     
                  WHERE h.numero_cuarto = $numero_cuarto 
                    AND ('$checkin' < r.check_out AND '$checkout' > r.check_in)";

        $results = $this->conexion->query($query);

        if ($results) {
            $fila = $results->fetch_assoc();

            if ($fila['cantidad_reservas'] > 0) {
                echo "<h1>La habitación está ocupada en las fechas proporcionadas.</h1>";
                $obtenerReserva = $this->obtenerReserva($numero_cuarto, $checkin, $checkout); //bueno solo toca ver si podes pasarle esta variable a la vista y recorrerla y mostrarla
                include '../vistas/usuarioReservado.php';
            } else {
                header('Location: http://localhost/prueba-tecnica-hotel/vistas/formReserva.php');
                echo "La habitación está disponible en las fechas proporcionadas.";
                exit();
            }
        } else {
            echo "Error en la consulta SQL";
        }
    }



    public function reservasActuales()
    {
        $query = "SELECT h.numero_cuarto, h.precio, r.check_in, r.check_out, c.nombre_apellido, c.telefono 
        FROM reservas r 
        INNER JOIN habitaciones h ON r.habitacion_id = h.id_habitacion
        INNER JOIN clientes c ON r.cliente_id = c.id_cliente ORDER BY r.check_in ASC";

        $resultado = $this->conexion->query($query);

        $datos = [];

        $i = 0;

        while ($fila = $resultado->fetch_assoc()) {
           $datos[$i]= $fila;
           $i++;
        }

        return $datos;
    }

    public function obtenerReserva($nro,$checkin,$checkout){
        $query = "SELECT h.numero_cuarto, h.precio, r.check_in, r.check_out, c.nombre_apellido, c.telefono 
        FROM reservas r 
        INNER JOIN habitaciones h ON r.habitacion_id = h.id_habitacion
        INNER JOIN clientes c ON r.cliente_id = c.id_cliente WHERE h.numero_cuarto = $nro AND r.check_in = $checkin AND r.check_out = $checkout";

        $resultado = $this->conexion->query($query);

        $datos = [];

        $i = 0;

        while ($fila = $resultado->fetch_assoc()) {
           $datos[$i]= $fila;
           $i++;
        }

        return $datos;

    }
}

// $hotel = new Hotel();
// $disponible = $hotel->verificarDisponibilidad(2, '2024-01-15', '2024-01-20');

?>

