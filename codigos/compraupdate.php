<?php include("../Conexion/conexion.php");

$id=$_POST['idcompra'];//tb_compra
$nombre=$_POST['Nom'];
$cliente=$_POST['cli'];
$numero=$_POST['num'];//tb_compra
$fecha=$_POST['fec'];
$cantidad=$_POST['can'];
$precio=$_POST['peu'];
$total=$_POST['tot'];


$consul="select stock from tb_producto where id_producto='$nombre'";
$resul=mysqli_query($conexion,$consul);
$row = mysqli_fetch_array($resul);

$r=$row['stock']+$cantidad;

$consul2="UPDATE tb_producto set stock='$r' where id_producto='$nombre'";

$consul3="UPDATE tb_compra set id_cliente='$cliente',id_producto='$nombre',numcomproban='$numero',
fecha='$fecha',cantidad='$cantidad',
precio='$precio',total='$total' where idcompra='$id' ";


$resul2=mysqli_query($conexion,$consul2);
$resul3=mysqli_query($conexion,$consul3);


if($resul2){
    ?>
    <?php     
    include("../php/compras.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se actualizó la compra.", "", "success");  
    </script>
    <?php
}else{
    ?>
    <?php     
    include("../php/compras.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al actualizar..", "", "error");  
    </script>
    <?php
}
?>