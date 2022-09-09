<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="../build/bootstrap5/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet" />
    <title>INICIO</title>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
        <form style="background-color:azure" class="border shadow p-5 rounded-2" style="width: 500px;" action="../php/validar.php" method="post">
            
            <h2 class="text-center pt-2">INICIAR SESION</h2>
            <hr>
            <div class="mb-3">
                <label for="usuar" class="form-label"><b>Usuario:</b></label>
                <input type="text" class="form-control" id="usuario" placeholder="Ingresar usuario" name="usuario">
            </div>
            <div class="mb-3">
                <label for="contra" class="form-label"><b>Contraseña:</b></label>
                <input type="password" class="form-control" id="contrase" placeholder="Ingresar contraseña" name="contrase">
            </div>

            <button type="submit" class="btn btn-primary"><b>INGRESAR</b></button>            
        </form>
    </div>
    
</body>

</html>