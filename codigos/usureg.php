<?php include("../Conexion/conexion.php");

$nombre=$_POST['nom'];
$apellido=$_POST['ape'];
$usuar=$_POST['usu'];
$contra=$_POST['con'];
$area=$_POST['are'];
$estado=$_POST['est'];
$cargo=$_POST['car'];

if($_POST['nom']==""){
    ?>
    <?php     
    include("../php/usuarios.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("NECESITA LLENAR LOS CAMPOS", "", "warning");  
    </script>
    <?php
}else{

    $consul="insert INTO usuario (nombre,apellidos,usuario,contra,area,estado,idcargo)
    values('$nombre','$apellido','$usuar','$contra','$area','$estado','$cargo') ";
    
    $resul=mysqli_query($conexion,$consul);
    
    if($resul){
        ?>
        <?php     
        include("../php/usuarios.php");
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>  
          swal("Registro satisfactorio!", "", "success");  
        </script>
        <?php
    }else{
        echo 'error';
    }
}
