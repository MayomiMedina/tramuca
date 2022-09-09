<?php include("../Conexion/conexion.php");

$id=$_POST['idcliente'];
$nombre=$_POST['nom'];
$apellido=$_POST['ape'];
$cell=$_POST['cel'];
$dni=$_POST['DNI'];
$direccion=$_POST['dir'];

$consul="UPDATE tb_cliente set nombre='$nombre', apellido='$apellido',celular='$cell',
DNI='$dni',direccion='$direccion' where id_cliente='$id' ";


$resul=mysqli_query($conexion,$consul);

if($resul){
    ?>
    <?php     
    include("../php/cliente.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se actualizó correctamente el cliente.", "", "success");  
    </script>
    <?php
}else{
    ?>
    <?php     
    include("../php/cliente.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al actualizar cliente..", "", "error");  
    </script>
    <?php
}
?>