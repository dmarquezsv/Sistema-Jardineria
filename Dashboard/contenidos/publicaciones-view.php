<?php  
  
  include_once 'controladores/PublicacioneControlador.php'; 
   $respuesta = new publicacioneControlador();
  
?>

<h1 class="h3 mb-0 text-gray-800">Publicaciones: </h1>
<hr>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Publicaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="" method="POST">
        	
        
    
        	<div class="form-group">
        		<label for="exampleFormControlInput1">Fecha Inicial</label>
        		<input type="date" class="form-control" name="inicio" id="inicio" placeholder="Fecha inicial" required>
        	</div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Fecha Final</label>
            <input type="date" class="form-control" name="final" id="final" placeholder="Fecha Final" required>
          </div>

           <div class="form-group">
            <label for="exampleFormControlInput1">comentario</label>
            <textarea class="form-control" name="comentario" id="comentario" placeholder="Comentario" required></textarea>
            
          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="Registrar" value="Registrar" class="btn btn-success">
      </div>
    </div>
  </div>
</div>

        </form>
<br><br>
<?php $respuesta->RegistrarPublicacionesControlador();
$respuesta->EliminarPublicacionesControlador();
$respuesta->ActualizarPublicionControlador();

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
                      <th>ID</th>
                      <th>Fecha Inicial</th>
                      <th>Fecha Final</th>
                      
                      <th>comentario</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                   
                     <th>Fecha Inicial</th>
                      <th>Fecha Final</th>
                      <th>comentario</th>
                      <th>comentario</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>
                    </tr>
                  </tfoot>
                  <tbody>
                   <?php $respuesta->MostrarPublicacionesControlador();

                   ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>



          <!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar la publicación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <p>Seguro que desea eliminar ID</p>
          <input type="text" name="" id="nombPublic" class="form-control" disabled>

          <input type="hidden" name="idpubliciacion" id="idPublic">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <input type="submit" name="Eliminar" value="Eliminar" class="btn btn-danger">
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
        <h5 class="modal-title" id="exampleModalLabel">Actualizar la publicación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          
              <div class="form-group">
            <label for="exampleFormControlInput1">Fecha Inicial</label>
            <input type="date" class="form-control" name="inicio" id="inicio2" placeholder="Fecha inicial">
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Fecha Final</label>
            <input type="date" class="form-control" name="final" id="final2" placeholder="Fecha Final">
          </div>

           <div class="form-group">
            <label for="exampleFormControlInput1">comentario</label>
            <textarea class="form-control" name="comentario" id="comentario2" placeholder="Comentario"></textarea>
            
          </div>

          <input type="hidden" name="idpubliciacion" id="IDPubl">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>



<script type="text/javascript">
  

   window.onload=function(){
    $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var v3= $(this).find("td:eq(0)").text(); 
        document.getElementById('nombPublic').value=v3;
        
        var v4= $(this).find("td:eq(0)").text(); 
        document.getElementById('idPublic').value=v4;


        var v5= $(this).find("td:eq(1)").text(); 
        document.getElementById('inicio2').value=v5;
        
        var v6= $(this).find("td:eq(2)").text(); 
        document.getElementById('final2').value=v6;

        var v7= $(this).find("td:eq(3)").text(); 
        document.getElementById('comentario2').value=v7;

        var v8= $(this).find("td:eq(0)").text(); 
        document.getElementById('IDPubl').value=v8;
         
    });    
}





</script>




