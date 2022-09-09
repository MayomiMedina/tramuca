<?php include("../Conexion/conexion.php");

$id=$_POST['idcompra'];



$consul4="DELETE FROM tb_compra where idcompra='$id'";

$resul4=mysqli_query($conexion,$consul4);

if($resul4){
    ?>
    <?php     
    include("../php/compras.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se eliminó la compra correctamente.", "", "success");  
    </script>
    <?php
}else{
    ?>
    <?php     
    include("../php/compras.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al eliminar..", "", "error");  
    </script>
    <?php
}
?>