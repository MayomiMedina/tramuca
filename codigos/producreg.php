<?php include("../Conexion/conexion.php");

$nombre=$_POST['nomb'];
$codigo=$_POST['cod'];
$cate=$_POST['cat'];
$marca=$_POST['mar'];

$consul="insert INTO tb_producto (producto,codigo,stock,categoria,marca)
values('$nombre','$codigo','$cate','$marca') ";


$resul=mysqli_query($conexion,$consul);

if($resul){
    ?>
    <?php     
    include("../php/productos.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Se registró el producto correctamente.", "", "success");  
    </script>
    <?php
}else{
    ?>
    <?php     
    include("../php/productos.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al registrar el prodcuto..", "", "error");  
    </script>
    <?php
}