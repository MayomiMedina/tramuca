<?php
class controladorUsuarios{
    static public  function ctrIngreso(){
        
        if(isset($_POST['usuario'])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['usuario'])&&preg_match('/^[a-zA-Z0-9]+$/',
            $_POST['contrase'])){

                $tabla = "usuario";
                $item = "usuario";
                $valor = $_POST['usuario'];
                $respuesta=ModeloUsuarios::MdlMostarUsuarios($tabla,$item,$valor);
                
                if($respuesta['usuario']==$_POST['usuario']&&$respuesta['contrase']==$_POST['contrase'
                ]){
                        
                 include("login.php");
        
                 }else{
                    echo("<div class='alert alert-warning' style='width: 100%;' role='alert'>
                    <p class='text-center'>
                     <i class='fa fa-exclamation-triangle' aria-hidden='true'></i><strong>FAVOR DE INGRESAR DATOS</strong></p>
                </div>");
                  }
              }
            
            }
        }
        
    }

    /*

    $user=$_POST['usuario'];
    $contra=$_POST['contrase'];
    
    session_start();
    
    $_SESSION['usuario']=$user;
    
    $consul="SELECT*FROM usuario WHERE usuario='$user' and contra='$contra'";
    $resul=mysqli_query($conexion,$consul);
    
    $row = mysqli_fetch_array($resul);
    
    if(!$user || !$contra){
        ?>
        <?php     
        include("login.php");
        ?>
       <div class="alert alert-warning" style="width: 100%;" role="alert">
        <p class="text-center">
         <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>FAVOR DE INGRESAR DATOS</strong></p>
    </div> 
        <?php
    }
    else if($row ){
        if($row['idcargo']==1 && $row['estado']=='Activo'){
               header("Location:../vistas/modulos/usuarios.php");            
        }else if($row['idcargo']==3 && $row['estado']=='Activo'){
        header("Location:../vistas/modulos/cliente.php");
        }
        else{   
            header("Location:../vistas/modulos/login.php");    
        }
    }else{
        ?>
        <?php     
        include("login.php");
        ?>
       <div class="alert alert-danger" style="width: 100%;" role="alert">
        <p class="text-center">
         <i class="fa fa-exclamation-triangle" aria-hidden="true"></i><strong>¡DATOS INCORRECTOS!</strong></p>
    </div> */
?>


    

