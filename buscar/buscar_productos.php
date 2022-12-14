<?php include ("../includes/heater.php");?>
<?php include("../Conexion/conexion.php")?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet" />



<div class="container-md-6 mx-3 bg-white shadow border">
    <h2 class="text-center pt-2">Productos</h2>
    <div class="col-md-12">

        <div class="row">
            

            <div class="col-md-12 col-lg-12 col-sm-12 px-4 ">
                <div class="row">

                <?php
                        $busqueda = $_REQUEST['busqueda'];
                        if(empty($busqueda))
                        {
                            header("location: buscar.productos.php");
                        }
                    
                    ?>

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalproducto"> Registrar Producto</button>

                    </div>

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <a  class="btn btn-success"> Exportar XSV </a>
                    </div>

                    <div class="col-md-4 d-grid gap-1 pt-1">
                        <span class="btn btn-info "> Imprimir</span>
                    </div>

                    <hr>
                    <div>
                    <form  action="buscar_productos.php" class="btn_new" class="form_search">
                    <input type="text" class="form-control" name="busqueda" id="busqueda" required placeholder="Código" value="<?php echo $busqueda; ?>">
                    <hr>
                    <center>
                    <input type="submit" value="Buscar producto" class="btn btn-outline-success btn_search">
                    </center>
                    </form>
                    </div>


                    <p></p>
                    <table class="table table-striped table-bordered">
                      <thead class="thead-dark">
                      <tr class="table-bordered">                        
                        <th>Producto</th>
                        <th>Codigo</th>
                        <th>Stock</th>
                        <th>Categoria</th>
                        <th>Marca</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $consul="SELECT * from tb_producto WHERE codigo='$busqueda'";
                        $resul=mysqli_query($conexion,$consul);
                        while($row=mysqli_fetch_assoc($resul)){
                        ?>
                        <tr>
                            <td><?php echo $row['producto'];?></td>
                            <td><?php echo $row['codigo'];?></td>
                            <td><?php echo $row['stock'];?></td>  
                            <td><?php echo $row['categoria'];?></td>
                            <td><?php echo $row['marca'];?></td>
                            <td><button type="button" class="btn" data-bs-toggle="modal" 
                            data-bs-target="#modalproductosupdate"
                                 data-bs-id="<?php echo $row['id_producto'];?>"
                                 data-bs-pro="<?php echo $row['producto'];?>"
                                 data-bs-cod="<?php echo $row['codigo'];?>"
                                 data-bs-sto="<?php echo $row['stock'];?>"
                                 data-bs-cat="<?php echo $row['categoria'];?>"
                                 data-bs-mar="<?php echo $row['marca'];?>"
                                 >
                                 <i class="fas fa-edit fa-2x" style="color:tomato"></i>

                              </button>
                            <button type="button" class="btn" data-bs-toggle="modal" 
                              data-bs-target="#eliminarproduc"
                              data-bs-id="<?php echo $row['id_producto'];?>"
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


<div class="modal fade" id="eliminarproduc" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/productelimi.php">          
              <input type="hidden" class="form-control" id="idproductos" name="idproductos">
              
            <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <input type="submit" class="btn btn-primary" value="Eliminar">
            </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>


<div class="modal fade" id="modalproductosupdate" tabindex="-1" aria-labelledby="exampleModalLabelUp" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/producupdate.php">
          
            <input type="hidden" class="form-control" id="idproducto" name="idproducto">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
            <input type="text" class="form-control" id="NomU" name="NomU" >
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="cod" name="cod">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Stock:</label>
            <input type="text" class="form-control" id="sto" name="sto">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Categoria:</label>
            <input type="text" class="form-control" id="cat" name="cat">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Marca:</label>
            <input type="text" class="form-control" id="mar" name="mar">
          </div>

          <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <input type="submit" class="btn btn-primary" value="Actualizar">
            </div>
            
        </form>

      </div>

      
      
    </div>
  </div>
</div>

<script>

    var exampleModal = document.getElementById('modalproductosupdate')
    exampleModal.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var recipient = button.getAttribute('data-bs-id')
      var pro = button.getAttribute('data-bs-pro')
      var cod = button.getAttribute('data-bs-cod')
      var sto = button.getAttribute('data-bs-sto')
      var cat = button.getAttribute('data-bs-cat')
      var mar = button.getAttribute('data-bs-mar')


      var modalBodyInput = exampleModal.querySelector('#idproducto')
      var codigo = exampleModal.querySelector('#cod')
      var nombre = exampleModal.querySelector('#NomU')
      var stock=exampleModal.querySelector('#sto')
      var cate = exampleModal.querySelector('#cat')
      var marc = exampleModal.querySelector('#mar')


      modalBodyInput.value = recipient;
      nombre.value=pro;
      codigo.value=cod;
      stock.value=sto;
      cate.value=cat;
      marc.value=mar;

    })

    var elimip = document.getElementById('eliminarproduc')
    elimip.addEventListener('show.bs.modal', function(event) {

            var button = event.relatedTarget

           var recipient = button.getAttribute('data-bs-id')
           var cod = button.getAttribute('data-bs-cod')

           var modalBodyInput = elimip.querySelector('#idproductos')
           var codigo = elimip.querySelector('#cod')
           var tituli =elimip.querySelector('.modal-title')

           tituli.textContent='¿Seguro de eliminar el codigo: '+ cod+'?'
           modalBodyInput.value = recipient

    })
  </script>


<div class="modal fade" id="modalproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../codigos/producreg.php">

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="cod" name="cod">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
            <input type="text" class="form-control" id="nomb" name="nomb">
          </div>
         
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Stock:</label>
            <input type="text" class="form-control" id="stoc" name="stoc">
          </div>
      
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Categoria:</label>
            <input type="text" class="form-control" id="cat" name="cat">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Marca:</label>
            <input type="text" class="form-control" id="mar" name="mar">
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