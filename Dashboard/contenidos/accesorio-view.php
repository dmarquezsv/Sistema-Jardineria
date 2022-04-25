<?php 
  
  

  include_once '../main/mainModel.php'; 
  $respuesta2 = new mainModel();


    $sql = "SELECT IDcategoria , Nombre FROM categoria";
    $stmt = $respuesta2->ejecutar_consulta_simple($sql);

     include_once 'controladores/AccesorioControlador.php'; 
   $respuesta = new AccesorioControlador();
  
 ?>

<h1 class="h3 mb-0 text-gray-800">Nuevo accesorio: </h1>
<hr>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo accesorio</h5>
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
            <label for="exampleFormControlTextarea1">Titulo</label>
            <input type="text" name="Titulo" id="NombreTitulo" class="form-control">
          <div id="datos2"></div>
            </div>

              <div class="form-group">
            <label for="exampleFormControlTextarea1">descripción</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comentario"> </textarea>
            </div>


        	<div class="form-group">
        		<label for="exampleFormControlInput1">cantidad</label>
        		<input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="cantidad de producto">
        	</div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Costo</label>
            <input type="number" class="form-control" name="Costo" id="Costo" placeholder="Costo del producto">
          </div>
	
	
		

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="Registrar" value="Registrar" class="btn btn-secondary">
        
      </div>
    </div>
  </div>
</div>
</form>
<br><br>

<?php $respuesta->RegistrarAccesorioControler(); 
  $respuesta->EliminarAaccesorioControlador(); 

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
                      <th>IDaccesorio</th>
                      <th>Categoria</th>
                      
                      <th>Titulo</th>
                      <th>cantidad</th>
                      <th>Costo</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                   <th>IDaccesorio</th>
                      <th>Categoria</th>
                      
                      <th>Titulo</th>
                      <th>cantidad</th>
                      <th>Costo</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>

                    </tr>
                  </tfoot>
                  <tbody>
                   <?php $respuesta->MostrarAccesorioControlador(); 
                   

                   ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>




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


