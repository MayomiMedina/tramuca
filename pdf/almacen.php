<?php
ob_start();

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>pdf</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



        <style>
          @page{
            margin: 0cm 0cm;
          }
          body{
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
          }
          header{
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            background-color: #03a9f1;
            color:aqua;
            text-align: center;
            line-height: 1.5cm;
          }
          footer{
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            background-color: #03a9f1;
            color:aqua;
            text-align: center;
            line-height: 1.5cm;
          }
        </style>

    </head>

    <body >
        <header>
          EMPRESA TRAMUCA 
        </header>

        <footer>
        <?php
                    date_default_timezone_set('America/lima');
                    echo date('l jS \of F Y h:i:s A');
                    
                    ?>
        </footer>

        <main>

    <?php include("../Conexion/conexion.php")?>
    <center><h1>Reporte de Almacen</h1></center>
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                      <tr class="table-bordered">                        
                        <th>Fecha</th>
                        <th>Seccion</th>
                        <th>Producto</th>
                        <th>Codigo</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                      </tr>                      
                      </thead>
                      <tbody>
                      <?php 
                        $consul="SELECT tb_almacen.id_almacen,
                        tb_almacen.id_producto,tb_almacen.fecha,tb_almacen.seccion,
                        tb_producto.producto,
                        tb_producto.stock,
                        tb_producto.categoria,tb_producto.marca,tb_producto.codigo
                        from tb_almacen
                        inner join tb_producto on tb_almacen.id_producto=tb_producto.id_producto";
                        $resul=mysqli_query($conexion,$consul);
                        while($row=mysqli_fetch_assoc($resul)){
                        ?>
                        <tr>                            
                            <td><?php echo $row['fecha'];?></td>
                            <td><?php echo $row['seccion'];?></td>
                            <td><?php echo $row['producto'];?></td>  
                            <td><?php echo $row['codigo'];?></td>
                            <td><?php echo $row['stock'];?></td>
                            <td><?php echo $row['categoria'];?></td>
                            <td><?php echo $row['marca'];?></td>
                            <td><button type="button" class="btn" data-bs-toggle="modal" 
                            data-bs-target="#modalalmacensupdate"
                                 data-bs-id="<?php echo $row['id_almacen'];?>"
                                 data-bs-pro="<?php echo $row['fecha'];?>"
                                 data-bs-sec="<?php echo $row['seccion'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>

                              </button>
                            <button type="button" class="btn" data-bs-toggle="modal" 
                              data-bs-target="#eliminaralmacen"
                              data-bs-id="<?php echo $row['id_almacen'];?>"
                              data-bs-cod="<?php echo $row['producto'];?>">
                              <i class="fa-solid fa-trash fa-2x"></i>                            
                              </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                      </tbody>
                    </table>
                    </div>
               

        </main>
    </body>
</html>
<?php 
$html=ob_get_clean();

require_once '../build/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf=new Dompdf();

$option=$dompdf->getOptions();
$option->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($option);

$dompdf->load_html($html);

$dompdf->setPaper('a4','landscape');
$dompdf->render();
$dompdf->stream("almacen.pdf",array("Attachment"=>false));

?>