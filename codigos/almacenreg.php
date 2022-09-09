<?php include("../Conexion/conexion.php");

$fecha=$_POST['fec'];
$produc=$_POST['pro'];
$secc=$_POST['sec'];

$consul="insert INTO tb_almacen (id_producto,fecha,Seccion)
values('$produc','$fecha','$secc') ";


$resul=mysqli_query($conexion,$consul);

if($resul){
    return header("Location:../php/almacen.php");
}else{
    echo 'error';
}