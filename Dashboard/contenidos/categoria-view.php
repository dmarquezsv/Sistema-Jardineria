<?php 

   include_once 'controladores/CategoriaControlador.php'; 
    $respuesta = new CategoriaControlador();


 ?>

<h1 class="h3 mb-0 text-gray-800">Nuevo categoria: </h1>
<hr>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="" method="POST">
        	
    

        	<div class="form-group">
        		<label for="exampleFormControlInput1">Nombre categoria</label>
        		<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la categoria" required>
        	</div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Decripción de la categoria" required></textarea>
        
          </div>
	
	
		

       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="Registrar" value="Registrar" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>
 </form>
<br><br>

<?php $respuesta->RegistrarCategoriaControlador();
$respuesta->ElimminarCategoriaControlador(); 
$respuesta->ActualizarCategoriaControlador(); 
      
 ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
  	<div class="card-header py-3">
  		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  			Nuevo categoria
  		</button>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>N°</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>N°</th>
                     <th>Nombre</th>
                     <th>Descripción</th>
                     <th>Actualizar</th>
                     <th>Eliminar</th>
                   </tr>
                 </tfoot>
                 <tbody>
             <?php 


              $respuesta->MostrarCategoriaControlador(); 

              ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar el categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        

          <div class="form-group">
            <label for="exampleFormControlInput1">Nombre categoria</label>
            <input type="text" class="form-control" name="nombre" id="categoria" placeholder="Nombre de la categoria">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Descripción</label>
            <textarea class="form-control" name="descripcion" id="desc" placeholder="Decripción de la categoria"></textarea>
            
          </div>


             <input type="hidden" name="idCategoria" id="idCategoria">
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-success">
      </div>
      </form>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar la categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <p>Seguro que desea eliminar</p>
          <input type="text" name="" id="categoriaEli" class="form-control" disabled>

          <input type="hidden" name="idCategoria" id="idcat">

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
        var idCategoria= $(this).find("td:eq(0)").text(); 
        document.getElementById('idCategoria').value=idCategoria;
        
        var nombreCateg= $(this).find("td:eq(1)").text(); 
        document.getElementById('categoria').value=nombreCateg;

           var desc= $(this).find("td:eq(2)").text(); 
        document.getElementById('desc').value=desc;

        var v1= $(this).find("td:eq(0)").text(); 
        document.getElementById('idcat').value=v1;

        var v2= $(this).find("td:eq(1)").text(); 
        document.getElementById('categoriaEli').value=v2;

         
    });    
}





</script>
