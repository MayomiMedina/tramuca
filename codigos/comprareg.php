<?php include("../Conexion/conexion.php");

$nombre=$_POST['Nom'];//tb_producto
$codigo=$_POST['cod'];//tb_producto
$nume=$_POST['num'];//tb_compra
$cantidad=$_POST['can'];//tb_detalle_compra
$peu=$_POST['peu'];//tb_detalle_compra
$total=$_POST['tot'];//tb_compra
$fecha=$_POST['fec'];//tb_compra
$cliente=$_POST['cli'];//tb_cli id


$consul="INSERT INTO tb_compra (id_cliente,id_producto,numcomproban,fecha,cantidad,precio,total) 
values ('$cliente','$nombre','$nume','$fecha','$cantidad','$peu','$total')";
$consul2="select stock from tb_producto where id_producto='$nombre'";


$resul=mysqli_query($conexion,$consul);
$resul2=mysqli_query($conexion,$consul2);
$row = mysqli_fetch_array($resul2);

$consul3="UPDATE tb_producto set stock='$row[stock]'+'$cantidad' where id_producto='$nombre'";
$resul3=mysqli_query($conexion,$consul3);

if($resul3){
  ?>
  <?php     
  include("../php/compras.php");
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>  
    swal("Registro satisfactorio.", "", "success");  
  </script>
  <?php
}else{
  ?>
  <?php     
  include("../php/compras.php");
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>  
    swal("Error al registrar la compra..", "", "error");  
  </script>
  <?php
}
?>