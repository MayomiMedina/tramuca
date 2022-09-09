<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Lista de productos.xls");
?>
<?php include("../Conexion/conexion.php")?>

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
  $consul="SELECT * from tb_producto";
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
