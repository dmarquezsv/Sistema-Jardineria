<?php 

 include_once 'controladores/plantasControlador.php'; 
 $respuesta = new plantasControladores();

  include_once '../main/mainModel.php'; 
  $respuesta2 = new mainModel();


    $sql = "SELECT IDcategoria , Nombre FROM categoria";
    $stmt = $respuesta2->ejecutar_consulta_simple($sql);

    $sql2 = "SELECT IDTiempo,FechaInicial , FechaFinal FROM publicaciones";
    $stmt2 = $respuesta2->ejecutar_consulta_simple($sql2);

      
?>

<h1 class="h3 mb-0 text-gray-800">Nuevo Producto: </h1>
<hr>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="" method="POST">
        	
        
          <div class="form-group">
            <label for="exampleFormControlInput1">Categoria</label>
            <select class="form-control" required name="categoria" id="categoria">
              <option value=""  selected  disabled>Seleccione la opción</option>
              <?php while ($item=$stmt->fetch())
              {
                echo "<option value=".$item['IDcategoria'].">".$item['Nombre']."</option>";
             }  
             ?>
              
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Fecha limite</label>
            <select class="form-control" required name="fecha" id="sexfechao">
              <option value=""  selected disabled >Seleccione la opción</option>
              <?php  

              while ($item2=$stmt2->fetch())
              {
                echo "<option value=".$item2['IDTiempo'].">Disponible: ".$item2['FechaInicial']." - ".$item2['FechaFinal']."</option>";
              } 
              ?>
            </select>
          </div>

        

          <div class="form-group">
            <label for="exampleFormControlInput1">Nombre del producto</label>
            <input type="text" class="form-control" name="Titulo" id="Titulo" placeholder="Nombre del producto" required>
            <div id="datos"></div>
          </div>


          <div class="form-group">
            <label for="exampleFormControlTextarea1">descripción</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comentario" required></textarea>
            </div>


        	<div class="form-group">
        		<label for="exampleFormControlInput1">cantidad</label>
        		<input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="cantidad de producto" required>
        	</div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Costo</label>
            <input type="text" class="form-control" name="Costo" id="Costo" placeholder="Costo del producto" required>
          </div>
	
	         <input type="hidden" name="iduser" value="<?php echo $_SESSION['IDuser'] ?>">


           		

      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="Registrar" value="Registrar" class="btn btn-secondary">
      </div>
        </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar el producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        <p>Seguro que desea eliminar</p>
        <input type="text" name="" id="planta" class="form-control" disabled>

        <input type="hidden" name="idProducto" id="idproducto">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="Eliminar" value="Eliminar" class="btn btn-danger">
      </div>
      </form>
    </div>
  </div>
</div>




<br><br>

<?php $respuesta->RegistrarPlantaControlador(); 
      $respuesta->EliminarPlantaControlador();
 ?>



  <!-- DataTales Example -->
  <div class="card shadow mb-4">
  	<div class="card-header py-3">
  		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  			Nuevo producto
  		</button>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>N°</th>
                      <th>Categoria</th>
                      <th>Fecha limite</th>
                      <th>Planta</th>
                      <th>cantidad</th>
                      <th>Costo</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N°</th>
                      <th>Categoria</th>
                      <th>Fecha limite</th>
                      <th>Planta</th>
                      <th>cantidad</th>
                      <th>Costo</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                    <?php $respuesta->MostrarPlantasControlador(); ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          






<script type="text/javascript">
  

   window.onload=function(){
    $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var idProducto= $(this).find("td:eq(0)").text(); 
        document.getElementById('idproducto').value=idProducto;
        
        var Planta= $(this).find("td:eq(3)").text(); 
        document.getElementById('planta').value=Planta;

        
         
    });    
}

</script>
