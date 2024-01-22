<?php
class Conexion {
    private $con;

    public function __construct() {
        $this->con = new mysqli('localhost', 'root', '', 'prueba_tecnica_hotel');

        if ($this->con->connect_error) {
            die("Error de conexión: " . $this->con->connect_error);
        }
    }

    public function query($sql) {
        return $this->con->query($sql);
    }

    public function prepare($sql) {
        return $this->con->prepare($sql);
    }
}
