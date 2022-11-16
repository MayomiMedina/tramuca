<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="../build/bootstrap5/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../css/estilos.css" rel="stylesheet" type="text/css">
    <title>INICIO</title>
    <style>

    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 85vh">
        <form style="background-color:white" class="border shadow p-5 rounded-2" style="width: 500px;" action="../php/validar.php" method="post">
            
            <h2 class="text-center pt-2">INICIAR SESION</h2>
            <hr>
            <br>
            <div class="input">
               
                <input type="text"  id="usuario" placeholder="Ingresar usuario" name="usuario" >
            </div>
            <br>
            <div class="input">
            
                <input type="password" id="contrase" placeholder="Ingresar contraseña" name="contrase" >
            </div>
<br>

         <button type="submit" class="btn btn-primary" ><b>INGRESAR</b></button>  </br>
            </br>
            <a class="" href="../php/forget.php">olvidaste contraseña?</a>
        </form>
         
    </div>
    
</body>

</html>