

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


    private function verificarDisponibilidad($numero_cuarto, $checkin, $checkout)
    {

        $query = " SELECT CASE
        WHEN check_in > '$checkin' AND  check_in > '$checkout ' AND '$checkin' >= NOW()  THEN 1
        WHEN check_out < '$checkin' THEN  1
        ELSE 0
        END AS disponibilidad 
          FROM reservas WHERE habitacion_id=$numero_cuarto ";

        $results = $this->conexion->query($query);

        if ($results) {
            $fila = $results->fetch_assoc();

            return $fila['disponibilidad'];
        }
    }
    public function Reservar($numero_cuarto, $checkin, $checkout)
    {

        $disponibilidad = $this->verificarDisponibilidad($numero_cuarto, $checkin, $checkout);

        if ($disponibilidad == 1) {

            echo "<h1 style='color: green'>La habitación está disponible en las fechas proporcionadas..</h1>";
        } else {
            echo "<h1 style='color: red'>La habitación está ocupada en las fechas proporcionadas.</h1>";
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
            $datos[$i] = $fila;
            $i++;
        }

        return $datos;
    }


    public function nuevaReserva($nombreyape, $telefono, $correo, $r_habitaciones, $precio, $check_in, $check_out)
    {
       $disponibilidad = $this->verificarDisponibilidad($r_habitaciones, $check_in, $check_out);

       if($disponibilidad == 0){
            return "<h1 style='color: red'>La habitación está ocupada en las fechas proporcionadas.</h1>";
       }

        try {
            $idCliente = $this->insertarCliente($nombreyape, $telefono, $correo);
            $habitacionId = $this->actualizarDisponibilidad($r_habitaciones, $precio);
            $reserva = $this->insertarReserva($check_in, $check_out, $idCliente,$habitacionId);
    
            echo "Se insertaron en las tablas 'clientes' y 'reservas', y se actualizó la tabla 'habitaciones'";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        } 

        return true;
    }

    private function insertarCliente($nombreyape, $telefono, $correo)
    {

        try {
            $queryClientes = "INSERT INTO clientes (nombre_apellido, telefono, correo, estado) VALUES (?, ?, ?, 0)";
            $stmtClientes = $this->conexion->prepare($queryClientes);
            $stmtClientes->bind_param("sss", $nombreyape, $telefono, $correo);
            $stmtClientes->execute();
            return $stmtClientes->insert_id;
        } catch (\Throwable $e) {
            echo $e;
        }
    }

    private function actualizarDisponibilidad($r_habitaciones, $precio)
    {
        try {
            $queryUpdateHabitacion = "UPDATE habitaciones SET precio = ?, disponibilidad = 0 WHERE numero_cuarto = ?";
            $stmtUpdateHabitacion = $this->conexion->prepare($queryUpdateHabitacion);
            $stmtUpdateHabitacion->bind_param("ii", $precio, $r_habitaciones);
            $stmtUpdateHabitacion->execute();

            return $r_habitaciones;
            
        } catch (\Throwable $e) {
            // $stmtUpdateHabitacion->Close();
            echo $e;    
        }
    }

    private function insertarReserva($check_in, $check_out, $idCliente,$habitacionId){
        try {
            $queryReservas = "INSERT INTO reservas (cliente_id, habitacion_id, check_in, check_out) VALUES (?, ?, ?, ?)";
            $stmtReservas = $this->conexion->prepare($queryReservas);
            $stmtReservas->bind_param("iiss", $idCliente, $habitacionId, $check_in, $check_out);
            $stmtReservas->execute();
        } catch (\Throwable $e) {
            echo $e;
        }
    }
}

?>

