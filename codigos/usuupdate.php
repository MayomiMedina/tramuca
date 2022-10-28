<?php include("../Conexion/conexion.php");

$id=$_POST['idusu'];
$nombre=$_POST['nom'];
$apellido=$_POST['ape'];
$usuar=$_POST['usu'];
$area=$_POST['are'];
$estado=$_POST['est'];
$cargo=$_POST['car'];

$consul1="SELECT * from usuario where idusu=$id";
$resul1=mysqli_query($conexion,$consul1);
$row1=mysqli_fetch_assoc($resul1);

$consul="UPDATE usuario set nombre='$nombre',apellidos='$apellido',usuario='$usuar',area='$area',
estado='$estado',idcargo='$cargo' where idusu='$id'";
$resul=mysqli_query($conexion,$consul);

$consul2="SELECT * from usuario where idusu=$id";
$resul2=mysqli_query($conexion,$consul2);
$row2=mysqli_fetch_assoc($resul2);

if($row1['nombre']==$row2['nombre']&&$row1['apellidos']==$row2['apellidos']&&$row1['usuario']==$row2['usuario']
&&$row1['contra']==$row2['contra']&&$row1['area']==$row2['area']&&$row1['estado']==$row2['estado']&&$row1['idcargo']==$row2['idcargo']){
    ?>
    <?php     
    include("../php/usuarios.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("No se realizaron cambios", "", "info");  
    </script>
    <?php
}else{
    ?>
    <?php     
    include("../php/usuarios.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Actualización satisfactoria", "", "success");  
    </script>
    <?php
}