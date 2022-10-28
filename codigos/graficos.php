<?php
require_once("../Conexion/conexion.php")
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Evov</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


        
        <script src="https://kit.fontawesome.com/2dc4d683dc.js" crossorigin="anonymous"></script>

        <link href="../build/bootstrap5/css/styles.css" rel="stylesheet" />
        <link href="../build/bootstrap5/css/bootstrap.css" rel="stylesheet" />    

       
        <!-- date-->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
       <script src="https://code.highcharts.com/highcharts.js"></script>


       <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

<style type="text/css">
.highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

		</style>

    </head>

    <body class="sb-nav-fixed">

    <script src="../build/code/highcharts.js"></script>
    <script src="../build/code/modules/data.js"></script>
    <script src="../build/code/modules/drilldown.js"></script>
    <script src="../build/code/modules/exporting.js"></script>
    <script src="../build/code/modules/export-data.js"></script>
    <script src="../build/code/modules/accessibility.js"></script>

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../php/heatfood.php">TRAMUCA</a>
            <!--<input type="submit" id="btninventario" class="navbar-brand ps-3" value="Inventario" style="color:dimgray">-->
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>

            <!-- USUARIO -->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="#!">Detalles</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../php/index.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            <!-- TERMINO DE USUARIO-->
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">Menu</div>

                            <a class="nav-link" href="../php/cliente.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Clientes
                            </a>

                            <a class="nav-link" href="../php/productos.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Productos
                            </a>
                            <a class="nav-link" href="../php/almacen.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Almacen
                            </a> 
                            <a class="nav-link" href="../php/compras.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                Compras
                            </a>                                           
                            <a class="nav-link" href="../php/ventas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ventas
                            </a>
    
                            
                            
                            
                        </div>
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                
<figure class="highcharts-figure">
    <div id="container"></div>
  
</figure>





		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'Los productos mas comprados'
    },

    subtitle: {
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    yAxis: {
        title: {
            text: 'Cantidad'
        }
    },

    xAxis: {
        categories:[
            <?php
            $consul="SELECT tb_producto.producto,SUM(tb_compra.cantidad) as  suma
            FROM `tb_compra` 
            INNER join tb_producto on tb_compra.id_producto=tb_producto.id_producto
            group by tb_producto.producto 
            order by tb_producto.producto DESC";
            $resul=mysqli_query($conexion,$consul);
            while($row=mysqli_fetch_assoc($resul)){
            ?>
              '<?php echo $row["producto"]?>',
            <?php
            }
            ?>
        ]
    },

    legend: {
        enabled: false
    },

    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: ''
            }
        }
    },

    series: [{
        name: 'productos',
        data: [
            <?php
            $consul="SELECT tb_producto.producto,SUM(tb_compra.cantidad) as  suma
            FROM `tb_compra` 
            INNER join tb_producto on tb_compra.id_producto=tb_producto.id_producto
            group by tb_producto.producto 
            order by tb_producto.producto DESC";
            $resul=mysqli_query($conexion,$consul);
            while($row=mysqli_fetch_assoc($resul)){
            ?>
              <?php echo $row["suma"]?>,
            <?php
            }
            ?>
        ]
   
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
		</script>
                <main>



<?php include ("../includes/footer.php");?>