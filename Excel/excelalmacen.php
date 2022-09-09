<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Almacen.xls");
?>
<?php include("../Conexion/conexion.php")?>

<table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                      <tr class="table-bordered">                        
                        <th>idalmacen</th>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Codigo</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                      </tr>                      
                      </thead>
                      <tbody>
                      <?php 
                        $consul="SELECT tb_almacen.id_almacen, tb_almacen.id_producto,tb_almacen.fecha,tb_almacen.proveedor,
                        tb_producto.producto,tb_producto.stock,tb_producto.categoria,tb_producto.marca,tb_producto.codigo
                        from tb_almacen
                        inner join tb_producto on tb_almacen.id_producto=tb_producto.id_producto";
                        $resul=mysqli_query($conexion,$consul);
                        while($row=mysqli_fetch_assoc($resul)){
                        ?>
                        <tr>
                            <td><?php echo $row['id_almacen'];?></td>
                            <td><?php echo $row['fecha'];?></td>
                            <td><?php echo $row['producto'];?></td>  
                            <td><?php echo $row['codigo'];?></td>
                            <td><?php echo $row['stock'];?></td>
                            <td><?php echo $row['categoria'];?></td>
                            <td><?php echo $row['marca'];?></td>
                            <td><button type="button" class="btn" data-bs-toggle="modal" 
                            data-bs-target="#modalalmacensupdate"
                                 data-bs-id="<?php echo $row['id_almacen'];?>"
                                 data-bs-pro="<?php echo $row['fecha'];?>"

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