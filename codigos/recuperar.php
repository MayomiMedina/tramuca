<?php include("../Conexion/conexion.php")?>
<?php 
$user=$_POST['usuario'];
$contra=$_POST['contrase'];
$contra2=$_POST['contrase2'];


$consul="SELECT*FROM usuario WHERE usuario='$user'";
$resul=mysqli_query($conexion,$consul);

$row = mysqli_fetch_array($resul);

if(!$user || !$contra || !$contra2){
    ?>
    <?php     
    include("../php/forget.php");
    ?>
   <div class="alert alert-warning" style="width: 100%;" role="alert">
    <p class="text-center">
     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>FAVOR DE INGRESAR DATOS</strong></p>
</div> 
    <?php
}
else if($row ){
    if($contra==$contra2){
            $consul2="UPDATE usuario set contra='$contra' where idusu='$row[idusu]'";
            $resl2=mysqli_query($conexion,$consul2);
            ?>
            <?php     
            include("../php/index.php");
            ?>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>  
              swal("Actualización satisfactoria", "", "success");  
            </script>
            <?php
    }else{
        ?>
        <?php     
        include("../php/forget.php");
        ?>
       <div class="alert alert-danger" style="width: 100%;" role="alert">
        <p class="text-center">
         <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>Las contraseñan no coinciden</strong></p>
    </div> 
        <?php
    }
}
else{
    ?>
    <?php     
    include("../php/forget.php");
    ?>
   <div class="alert alert-danger" style="width: 100%;" role="alert">
    <p class="text-center">
     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>¡DATOS INCORRECTOS!</strong></p>
</div> 
    <?php
}
mysqli_free_result($resul);
mysqli_close($conexion);