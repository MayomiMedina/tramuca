<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Calidad</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


        
        <script src="https://kit.fontawesome.com/2dc4d683dc.js" crossorigin="anonymous"></script>

        <link href="../build/bootstrap5/css/styles.css" rel="stylesheet" />
        <link href="../build/bootstrap5/css/bootstrap.css" rel="stylesheet" />    
    <link rel="stylesheet" href="../php/estilo.css">
    <link href="../css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh">
        <form style="background-color:white" class="border shadow p-5 rounded-2" style="width: 500px;" 
        action="../codigos/recuperar.php" method="post">
            
            <h2 class="text-center pt-2">NUEVA CONTRASEÑA</h2>
            <hr>
            <br>
            <div class="input">
               
                <input type="text" class="form-control" id="usuario" placeholder="Ingresar usuario" name="usuario">
            </div>
            <br>
            <div class="input">
                
                <input type="password" class="form-control" id="contrase" placeholder="Ingresar contraseña" name="contrase">
            </div>
            <br>
            <div class="input">
                
                <input type="password" class="form-control" id="contrase2" placeholder="Ingresar contraseña" name="contrase2">
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><b>Recuperar</b></button>      
            
            <a class="btn btn-success" href="../php/index.php" ><b>Regresar</b></a>     
        </form>
        
         
    </div>

    </body>