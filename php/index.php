<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="../build/bootstrap5/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link href="../css/estiloindex.css" rel="stylesheet" >
    <title>INICIO</title>
</head>

<body>

    <div class="login-card" >

        <h2>Login</h2>
        <h3>Ingrese sus datos</h3>
        <form class="login-form" action="../php/validar.php" method="post">
            
         
                <input type="text"  id="usuario" placeholder="Ingresar usuario" name="usuario" >
            
            
                <input type="password" id="contrase" placeholder="Ingresar contraseña" name="contrase" >


            <a href="../php/forget.php">olvidaste contraseña?</a>
            <button  >Ingresar</button> 
        </form>
         
    </div>
    
</body>

</html>