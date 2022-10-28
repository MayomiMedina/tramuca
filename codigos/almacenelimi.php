<?php include("../Conexion/conexion.php");

$id=$_POST['id'];

$consul="DELETE from tb_almacen where id_almacen='$id' ";


$resul=mysqli_query($conexion,$consul);

if($resul){
    return header("Location:../vistas/modulos/almacen.php");
}else{
    echo 'error';
}