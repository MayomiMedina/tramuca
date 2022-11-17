<?php include("../Conexion/conexion.php")?>
<?php
$user=$_POST['usuario'];
$contra=$_POST['contrase'];
$con=3;

session_start();

$_SESSION['usuario']=$user;

$consul="SELECT*FROM usuario WHERE usuario='$user' and contra='$contra'";
$resul=mysqli_query($conexion,$consul);

$row = mysqli_fetch_array($resul);

if(!$user || !$contra){
    header("Location: ../index.html");    
    ?>
   <div class="alert alert-warning" style="width: 100%;" role="alert">
    <p class="text-center">
     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>FAVOR DE INGRESAR DATOS</strong></p>
</div> 
    <?php
}
else if($row ){
    if($row['idcargo']==1 && $row['estado']=='Activo'){
           header("Location:../php/usuarios.php");            
    }else if($row['idcargo']==3 && $row['estado']=='Activo'){
    header("Location:../codigos/graficos.php");
    }
    else{   
        header("Location: ../index.html");  
    }
}else{
    $con=$con-1;     
    header("Location: ../index.html"); 
    ?>
   <div class="alert alert-danger" style="width: 100%;" role="alert">
    <p class="text-center">
     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>¡DATOS INCORRECTOS!</strong></p>
</div> 
    <?php
    echo $con;
}
mysqli_free_result($resul);
mysqli_close($conexion);
