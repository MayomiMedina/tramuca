<?php include("../Conexion/conexion.php");

$id=$_POST['idcompra'];
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
$consul2="select cantidad from tb_boleta where id_boleta='$id'";
$resul2=mysqli_query($conexion,$consul2);
$row2 = mysqli_fetch_array($resul2);

$r=$row['stock']+$row2['cantidad'];
$y=$r-$can;
if($y<0){
  ?>
  <?php     
  include("../vistas/modulos/ventas.php");
  ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>  
    swal("NO SE PUEDE ACTUALIZAR NO TENEMOS SUFICIENTE STOCK", "", "error");  
  </script>
  <?php
}else{
  $consul3="UPDATE tb_boleta set id_cliente='$cli',id_producto='$pro',fecha='$fec',
  RUC='$ruc',descripcion='$desc',comprobante='$com',
  cantidad='$can',precio='$pre',total='$total' where id_boleta='$id' ";
$resul3=mysqli_query($conexion,$consul3);

  $consul4="update tb_producto set stock='$y' where id_producto='$pro'";
  $resul4=mysqli_query($conexion,$consul4);
  
  
  if($resul4){
    ?>
    <?php     
    include("../vistas/modulos/ventas.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se registró la actualizacion correctamente.", "", "success");  
    </script>
    <?php
    }else{
    ?>
    <?php     
    include("../vistas/modulos/ventas.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al actualizar la venta..", "", "error");  
    </script>
    <?php
    }
}



