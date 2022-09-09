<?php include ("../includes/heater.php");?>
<?php include("../Conexion/conexion.php")?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet" />



<div class="container-md-6 mx-3 bg-white shadow border">
    <h2 class="text-center pt-2">Lista de compras</h2>
    <div class="col-md-12">

        <div class="row">
            

            <div class="col-md-12 col-lg-12 col-sm-12 px-4 ">
                <div class="row">

                <?php
                        $busqueda = $_REQUEST['busqueda'];
                        if(empty($busqueda))
                        {
                            header("location: buscar.compras.php");
                        }
                    
                    ?>

                    

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalcompras"> Registrar Compra</button>

                    </div>

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <a href="" class="btn btn-success"> Exportar XSV </a>
                    </div>

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <span class="btn btn-info "> Imprimir</span>
                    </div>
                    <hr>

                    <div>
                    <form  action="buscar_compras.php" class="btn_new" class="form_search">
                    <input type="text" class="form-control mb-2" name="busqueda" id="busqueda" placeholder="Código" value="<?php echo $busqueda; ?>">
                    <hr>
                    <center>
                    <input type="submit" value="Buscar compra" class="btn btn-outline-success btn_search">
                    </center>
                    </form>
                    </div>

                    <p></p>
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
                        from ((tb_compra inner join tb_producto on tb_compra.id_producto=tb_producto.id_producto) inner join tb_cliente on tb_compra.id_cliente=tb_cliente.id_cliente)";
                        if(isset($_GET["busqueda"])){
                        $resul=mysqli_query($conexion,$consul);
                        }
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
              
                
                </div>
            </div>
          </div>
        </div>

    </div>    
</div>


<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/compraelimi.php">          
              <input type="hidden" class="form-control" id="idcompra" name="idcompra">
              
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <input type="submit" class="btn btn-primary" value="Eliminar">
            </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>


<div class="modal fade" id="modalcomprasupdate" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/compraupdate.php">
          
            <input type="hidden" class="form-control" id="idcompra" name="idcompra">

            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="cod" name="cod">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
            <select class="form-select" id="Nom" name="Nom" require>
            <?php 
              $consul="SELECT * from tb_producto";
              $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
                echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
              }
            ?>
            </select>
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Cliente</label>
            <select class="form-select" id="cli" name="cli" require>
            <?php 
              $consul="SELECT * from tb_cliente";
              $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
                echo '<option value="'.$row['id_cliente'].'">' .$row['nombre']. '</option>';
              }
            ?>            
            </select>
          </div>
         
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Num_comprobante:</label>
            <input type="text" class="form-control" id="num" name="num">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha:</label>
            <input type="text" class="form-control" id="fec" name="fec">
          </div>
      
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cantidad:</label>
            <input type="number" class="form-control" id="can" name="can">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio Unidad:</label>
            <input type="number" class="form-control" id="peu" name="peu">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Total:</label>
            <input type="number" class="form-control" id="tot" name="tot">
          </div>
          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>

<script>

    var exampleModal = document.getElementById('modalcomprasupdate')
    exampleModal.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var recipient = button.getAttribute('data-bs-id')
      var cod = button.getAttribute('data-bs-cod')
      var num = button.getAttribute('data-bs-num')
      var fec = button.getAttribute('data-bs-fec')
      var can = button.getAttribute('data-bs-can')
      var pre = button.getAttribute('data-bs-pre')
      var tot = button.getAttribute('data-bs-tot')



      var modalBodyInput = exampleModal.querySelector('#idcompra')
      var codigo = exampleModal.querySelector('#cod')
      var nume = exampleModal.querySelector('#num')
      var fecha = exampleModal.querySelector('#fec')
      var cant = exampleModal.querySelector('#can')
      var prec = exampleModal.querySelector('#peu')
      var total = exampleModal.querySelector('#tot')



      modalBodyInput.value = recipient;
      codigo.value=cod;
      nume.value=num;
      fecha.value=fec;
      cant.value=can;
      prec.value=pre;
      total.value=tot;
 

    })

    var elimi = document.getElementById('eliminar')
    elimi.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
           // Extract info from data-bs-* attributes
           var recipient = button.getAttribute('data-bs-id')
           var cod = button.getAttribute('data-bs-cod')

           var modalBodyInput = elimi.querySelector('#idcompra')
           var codigo = elimi.querySelector('#cod')
           var tituli =elimi.querySelector('.modal-title')

           tituli.textContent='¿Seguro de eliminar el codigo: '+ cod+'?'
           modalBodyInput.value = recipient

    })
  </script>


<div class="modal fade" id="modalcompras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/comprareg.php">
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="cod" name="cod">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
            <select class="form-select" id="Nom" name="Nom" require>
            <?php 
              $consul="SELECT * from tb_producto";
              $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
                echo '<option value="'.$row['id_producto'].'">' .$row['producto']. '</option>';
              }
            ?>
            </select>
          </div>
          <div class="mb-3">
          <label for="recipient-name" class="col-form-label">Cliente</label>
            <select class="form-select" id="cli" name="cli" require>
            <?php 
              $consul="SELECT * from tb_cliente";
              $resul=mysqli_query($conexion,$consul);
              while($row=mysqli_fetch_assoc($resul)){
                echo '<option value="'.$row['id_cliente'].'">' .$row['nombre']. '</option>';
              }
            ?>            
            </select>
          </div>
         
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Num_comprobante:</label>
            <input type="text" class="form-control" id="num" name="num">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Fecha:</label>
            <input type="text" class="form-control" id="fec" name="fec">
          </div>
      
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Cantidad:</label>
            <input type="number" class="form-control" id="can" name="can">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Precio Unidad:</label>
            <input type="number" class="form-control" id="peu" name="peu">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Total:</label>
            <input type="number" class="form-control" id="tot" name="tot">
          </div>
          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>






<?php include ("../includes/footer.php");?>