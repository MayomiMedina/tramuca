<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Lista de ventas.xls");
?>
<?php include("../Conexion/conexion.php")?>

<table class="table table-striped table-bordered">
            <thead class="thead-dark">
              <tr class="table-bordered">
                <th>Comprobante</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>RUC</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $consul = "SELECT tb_boleta.id_boleta,tb_boleta.id_cliente,tb_boleta.id_producto,tb_boleta.fecha,
                        tb_boleta.RUC,tb_boleta.descripcion,tb_boleta.comprobante,tb_boleta.cantidad,tb_boleta.precio,
                        tb_boleta.total,tb_producto.producto,tb_cliente.nombre
                        from ((tb_boleta
                        inner join tb_producto on tb_boleta.id_producto=tb_producto.id_producto)
                        inner join tb_cliente on tb_boleta.id_cliente=tb_cliente.id_cliente)";

              $resul = mysqli_query($conexion, $consul);
              while ($row = mysqli_fetch_assoc($resul)) {
              ?>
                <tr>
                  <td><?php echo $row['comprobante']; ?></td>
                  <td><?php echo $row['producto']; ?></td>
                  <td><?php echo $row['nombre']; ?></td>
                  <td><?php echo $row['fecha']; ?></td>
                  <td><?php echo $row['RUC']; ?></td>
                  <td><?php echo $row['descripcion']; ?></td>
                  <td><?php echo $row['cantidad']; ?></td>
                  <td><?php echo $row['precio']; ?></td>
                  <td><?php echo $row['total']; ?></td>
                  <td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#updateventas"
                    data-bs-id="<?php echo $row['id_boleta']; ?>"
                    data-bs-com="<?php echo $row['comprobante']; ?>"
                    data-bs-pro="<?php echo $row['producto']; ?>"
                    data-bs-nom="<?php echo $row['nombre']; ?>"
                    data-bs-fec="<?php echo $row['fecha']; ?>"
                    data-bs-ruc="<?php echo $row['RUC']; ?>"
                    data-bs-desc="<?php echo $row['descripcion']; ?>"
                    data-bs-can="<?php echo $row['cantidad']; ?>"
                    data-bs-pre="<?php echo $row['precio']; ?>"
                    data-bs-tot="<?php echo $row['total']; ?>"
                    >
                      <i class="fas fa-edit fa-2x" style="color:tomato"></i>

                    </button>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#eliminaralmacen"
                     data-bs-id="<?php echo $row['id_boleta']; ?>" 
                     data-bs-cod="<?php echo $row['producto']; ?>"
                     >
                      <i class="fa-solid fa-trash fa-2x"></i>
                    </button>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
