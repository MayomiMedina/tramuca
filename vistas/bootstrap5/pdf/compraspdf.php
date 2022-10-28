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
    <center><h1>Reporte de compras</h1></center>
    <div class="table-responsive">
    <table class="table" >
                      <thead class="thead-light">
                      <tr class="table-bordered">                        
                        <th scopre="col">Codigo</th>
                        <th>Nombre del producto</th>
                        <th>Num_comprobante</th>
                        <th>Cliente </th>
                        <th>Fecha de compra</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $consul="SELECT tb_compra.idcompra,tb_producto.producto,tb_producto.codigo,
                        tb_compra.numcomproban,tb_compra.fecha,tb_compra.cantidad,tb_compra.precio,tb_compra.total,
                        tb_cliente.nombre
                        from ((tb_compra
                        inner join tb_producto on tb_compra.id_producto=tb_producto.id_producto)
                        inner join tb_cliente on tb_compra.id_cliente=tb_cliente.id_cliente)";
                        $resul=mysqli_query($conexion,$consul);
                        while($row=mysqli_fetch_assoc($resul)){
                        ?>
                        <tr>
                            <td><?php echo $row['codigo'];?></td>
                            <td><?php echo $row['producto'];?></td>
                            <td><?php echo $row['numcomproban'];?></td> 
                            <td><?php echo $row['nombre'];?></td>
                            <td><?php echo $row['fecha'];?></td>
                            <td><?php echo $row['cantidad'];?></td>
                            <td><?php echo $row['precio'];?></td>
                            <td><?php echo $row['total'];?></td>                                                    
          
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

require_once '../vistas/librerias/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf=new Dompdf();

$option=$dompdf->getOptions();
$option->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($option);

$dompdf->load_html($html);

$dompdf->setPaper('a4','landscape');
$dompdf->render();
$dompdf->stream("compras.pdf",array("Attachment"=>false));

?>