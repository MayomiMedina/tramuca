<?php include("../Conexion/conexion.php");

$id=$_POST['idusu'];

$consul="DELETE from usuario where idusu='$id'";


$resul=mysqli_query($conexion,$consul);

if($resul){
        ?>
        <?php     
        include("../php/usuarios.php");
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>  
          swal("Se eliminĂ³ al usuario correctamente", "", "success");  
        </script>
        <?php
}else{ 
    ?>
    <?php     
    include("../php/usuarios.php");
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>  
      swal("Error al eliminar el usuario..", "", "error");  
    </script>
    <?php
}