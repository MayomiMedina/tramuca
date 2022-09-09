<?php include("../Conexion/conexion.php");

$id=$_POST['idproductos'];


$consul="DELETE from tb_producto where id_producto='$id' ";

$resul=mysqli_query($conexion,$consul);

if($resul){
    ?>
    <?php     
    include("../php/productos.php");
    // return header("Location:../php/productos.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se eliminó el producto satisfactoriamente.", "", "success");  
    </script>
    <?php
    
}else{
    ?>
    <?php     
    include("../php/productos.php");
    // return header("Location:../php/productos.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Ups! error al eliminar el producto.", "", "error");  
    </script>
    <?php
}
