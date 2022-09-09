<?php include("../Conexion/conexion.php");

$id=$_POST['id'];




$consul="select id_producto, cantidad from tb_boleta where id_boleta='$id'";
$resul=mysqli_query($conexion,$consul);
$row = mysqli_fetch_array($resul);

$consul2="select stock from tb_producto where id_producto='$row[id_producto]'";
$resul2=mysqli_query($conexion,$consul2);
$row2 = mysqli_fetch_array($resul2);

$r=$row['cantidad']+$row2['stock'];

  $consul3="update tb_producto set stock='$r' where id_producto='$row[id_producto]'";
  $resul3=mysqli_query($conexion,$consul3);
  $consul4="delete from tb_boleta where id_boleta='$id'";
  $resul4=mysqli_query($conexion,$consul4);
  if($resul4){
    ?>
    <?php     
    include("../php/ventas.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se registró la venta correctamente.", "", "success");  
    </script>
    <?php
    }else{
    ?>
    <?php     
    include("../php/ventas.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al registrar la venta..", "", "error");  
    </script>
    <?php
    }

