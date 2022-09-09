<?php include("../Conexion/conexion.php");

$id=$_POST['id'];
$fecha=$_POST['fec'];
$produc=$_POST['pro'];
$sec=$_POST['secc'];

$consul="UPDATE tb_almacen set id_producto='$produc',fecha='$fecha',seccion='$sec' where id_almacen='$id' ";


$resul=mysqli_query($conexion,$consul);

if($resul){
    return header("Location:../php/almacen.php");
}else{
    echo 'error';
}