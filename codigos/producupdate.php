<?php include("../Conexion/conexion.php");

$id=$_POST['idproducto'];
$nombre=$_POST['NomU'];
$categoria=$_POST['cat'];
$marca=$_POST['mar'];


$consul="UPDATE tb_producto set producto='$nombre' ,categoria='$categoria',marca='$marca'
 where id_producto='$id' ";

$resul=mysqli_query($conexion,$consul);

if($resul){
    ?>
    <?php     
    include("../php/productos.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se actualizó el producto correctamente.", "", "success");  
    </script>
    <?php
}else{
    ?>
    <?php     
    include("../php/productos.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al actualizar el producto..", "", "error");  
    </script>
    <?php
}
?>