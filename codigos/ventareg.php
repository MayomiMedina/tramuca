<?php include("../Conexion/conexion.php");

$fec=$_POST['fec'];
$ruc=$_POST['ruc'];
$desc=$_POST['des'];
$com=$_POST['com'];
$cli=$_POST['cli'];
$pro=$_POST['pro'];
$can=$_POST['can'];
$pre=$_POST['pre'];
$total=$can*$pre;

$consul="select stock from tb_producto where id_producto='$pro'";
$resul=mysqli_query($conexion,$consul);
$row = mysqli_fetch_array($resul);

$r=$row['stock']-$can;
if($r<0){
  ?>
  <?php     
  include("../vistas/modulos/ventas.php");
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>  
    swal("NO SE PUEDE HACER LA VENTA PORQUE NO TIENE SUFICIENTE STOCK", "", "error");  
  </script>
  <?php
}else{
  $consul2="INSERT INTO tb_boleta (id_cliente,id_producto,fecha,ruc,descripcion,comprobante,cantidad,precio,total)
  values('$cli','$pro','$fec','$ruc','$desc','$com','$can','$pre','$total') ";
  $resul2=mysqli_query($conexion,$consul2);
  $consul3="update tb_producto set stock='$r' where id_producto='$pro'";
  $resul3=mysqli_query($conexion,$consul3);
  if($resul3){
    ?>
    <?php     
    include("../vistas/modulos/ventas.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se registró la venta correctamente.", "", "success");  
    </script>
    <?php
    }else{
    ?>
    <?php     
    include("../vistas/modulos/ventas.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al registrar la venta..", "", "error");  
    </script>
    <?php
    }
}







