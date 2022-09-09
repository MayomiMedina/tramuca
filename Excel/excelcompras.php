<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Lista_Compras.xls");
header("Expires: 0");
?>
<?php include("../Conexion/conexion.php")?>


                <table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                      <tr class="table-bordered">                        
                        <th>Codigo</th>
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
                            <td><button type="button" class="btn" data-bs-toggle="modal" 
                            data-bs-target="#modalcomprasupdate"
                                 data-bs-id="<?php echo $row['idcompra'];?>"
                                 data-bs-cod="<?php echo $row['codigo'];?>"
                                 data-bs-pro="<?php echo $row['producto'];?>"
                                 data-bs-num="<?php echo $row['numcomproban'];?>"
                                 data-bs-fec="<?php echo $row['fecha'];?>"
                                 data-bs-can="<?php echo $row['cantidad'];?>"
                                 data-bs-cli="<?php echo $row['nombre'];?>"
                                 data-bs-pre="<?php echo $row['precio'];?>"
                                 data-bs-tot="<?php echo $row['total'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>
                                 
                              </button>
                            <button type="button" class="btn" data-bs-toggle="modal" 
                              data-bs-target="#eliminar"
                              data-bs-id="<?php echo $row['idcompra'];?>"
                              data-bs-cod="<?php echo $row['codigo'];?>">
                              <i class="fa-solid fa-trash fa-2x"></i>                            
                              </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                      </tbody>
                </table>
                      