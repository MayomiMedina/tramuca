<?php include("../Conexion/conexion.php");

$nombre=$_POST['nom'];
$apellido=$_POST['ape'];
$cell=$_POST['cel'];
$dni=$_POST['DNI'];
$direccion=$_POST['dir'];

$consul="insert INTO tb_cliente (nombre,apellido,celular,DNI,direccion) 
values ('$nombre','$apellido','$cell','$dni','$direccion') ";

$verifiDNI="select * from tb_cliente where DNI='$dni' ";
$resul2=mysqli_query($conexion,$verifiDNI);

if(mysqli_num_rows($resul2)>0){
   echo'<script>
   alert("Ya se registro ese DNI");
   window.location="../php/cliente.php";
   </script>';
    exit();
}

$resul=mysqli_query($conexion,$consul);

if($resul){
    ?>
    <?php     
    include("../php/cliente.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Registro satisfactorio.", "", "success");  
    </script>
    <?php
}else{
    ?>
    <?php     
    include("../php/cliente.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al registrar cliente..", "", "error");  
    </script>
    <?php
}
?>