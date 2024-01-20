<?php
class Conexion{
    private  $con;

    public function __construct(){
        $this->con = new mysqli('localhost','root','','prueba_tecnica_hotel');
    }

    public function query($sql){
        return $this->con->query($sql);
    }
}
 