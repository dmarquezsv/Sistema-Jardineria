 <?php  include_once 'controladores/notificacionesControladores.php'; 
     $respuesta = new Notificaciones();  ?>


 <h3>Notificaciones</h3>
 <hr>
  	<?php $respuesta->EliminarNotificaciones(); ?>

 <!-- DataTales Example -->
  <div class="card shadow mb-4">
  	<div class="card-header py-3">
  	  Clientes	
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
                     
                      <th>Eliminar</th>

                    </tr>
                  </tfoot>
                  <tbody>
                   
                   
                  	<?php $respuesta->MostrarNotificaciones(); ?>
                   
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>



    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar la notificacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
        <p>Seguro que desea eliminar</p>
        

        <input type="hidden" name="idnoti" id="idnoti">

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
        document.getElementById('idnoti').value=idProducto;
        
       
        
         
    });    
}

</script>