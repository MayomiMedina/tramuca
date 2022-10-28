<?php include("../Conexion/conexion.php");

$id=$_POST['idclientess'];

$consul="UPDATE tb_compra set id_cliente=NULL where id_cliente='$id'";
$consul2="DELETE from tb_cliente where id_cliente='$id';";

$resul=mysqli_query($conexion,$consul);
$resul2=mysqli_query($conexion,$consul2);

if($resul2){
    ?>
    <?php     
    include("../vistas/modulos/cliente.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se eliminó al cliente de forma satisfactoria.", "", "success");  
    </script>
    <?php
}else{
    ?>
    <?php     
    include("../vistas/modulos/cliente.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al eliminar cliente..", "", "error");  
    </script>
    <?php
}
?>