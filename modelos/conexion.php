<?php
/*$servidor="localhost";
$user="root";
$pass="";
$bd="autopartes_calidad";

$conexion= new mysqli($servidor,$user,$pass,$bd);

if($conexion->connect_errno){
    die("error al conectar".$conexion->connect_errno);
}*/
class conexion{
    static public function conectar (){
        $link= new PDO("mysql:host=localhost;dbname=autopartes_calidad", "root","");
        $link -> exec("set names utf8");
        return $link;
    }
}

?>