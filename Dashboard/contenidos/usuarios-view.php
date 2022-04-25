<?php  
  
  include_once 'controladores/usuarioControlador.php'; 
   $respuesta = new usuarioControlador();
  
?>


<h1 class="h3 mb-0 text-gray-800">Nuevo Usuario: </h1>
<hr>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="" method="POST">
        	
        	<div class="form-group">
        		<label for="exampleFormControlInput1">Nombre Completo</label>
        		<input type="text" class="form-control" name="nombre" id="nombre2" placeholder="nombre de usuario" required>
        	</div>


        	<div class="form-group">
        		<label for="exampleFormControlInput1">Correo Electrónico</label>
        		<input type="email" class="form-control" name="correo" id="correo2" placeholder="Correo Electrónico" required>
            <div id="datos"></div>
        	</div>

        	<div class="form-group">
        		<label for="exampleFormControlInput1">Contraseña</label>
        		<input type="password" class="form-control" name="contra" id="contra2" placeholder="ingrese la contraseña" required>
        	</div>


        	<div class="form-group">
        		<label for="exampleFormControlInput1">Sexo</label>
        		<select class="form-control" required name="sexo" id="sexo2">
        			<option value="" disabled selected >Seleccione la opción</option>
        			<option value="Masculino"  >Masculino</option>
        			<option value="Femenino"  >Femenino</option>
        		</select>
        	</div>
	
		<div class="form-group">
        		<label for="exampleFormControlInput1">Cargo</label>
        		<select class="form-control" required name="cargo" id="cargo2">
        			<option value="" disabled selected >Seleccione la opción</option>
        			<option value="Administrador">Administrador</option>
        			<option value="Cliente">Cliente</option>
        		</select>
        </div>
	
		<div class="form-group">
        		<label for="exampleFormControlInput1">Estado</label>
        		<select class="form-control" required name="estado" id="estado2">
        			<option value="" disabled selected >Seleccione la opción</option>
        			<option value="Activo">Activo</option>
        			<option value="Desactivo">Desactivo</option>
        		</select>
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
<?php $respuesta->RegistrarUsuarioControlador();
      $respuesta->EliminarUsuarioControlador();
      $respuesta->ActualizarPublicionControlador();

 ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
  	<div class="card-header py-3">
  		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  			Nuevo Usuario
  		</button>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Sexo</th>
                      <th>Cargo</th>
                      <th>Estado</th>
                      <th>Inscrito</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>ID</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Sexo</th>
                      <th>Cargo</th>
                      <th>Estado</th>
                      <th>Inscrito</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $respuesta->MostrarUsuariosControlador(); ?>
                  
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
            <label for="exampleFormControlInput1">Nombre Completo</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre de usuario" required>
          </div>


          <div class="form-group">
            <label for="exampleFormControlInput1">Correo Electrónico</label>
            <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo Electrónico" required>
          </div>

     


          <div class="form-group">
            <label for="exampleFormControlInput1">Sexo</label>
            <select class="form-control" required name="sexo" id="sexo">
              <option value="" disabled selected >Seleccione la opción</option>
             <option value="Masculino"  >Masculino</option>
              <option value="Femenino"  >Femenino</option>
            </select>
          </div>
  
    <div class="form-group">
            <label for="exampleFormControlInput1">Cargo</label>
            <select class="form-control" required name="cargo" id="cargo">
              <option value="" disabled selected >Seleccione la opción</option>
              <option value="Administrador">Administrador</option>
              <option value="Cliente">Cliente</option>
            </select>
        </div>
  
    <div class="form-group">
            <label for="exampleFormControlInput1">Estado</label>
            <select class="form-control" required name="estado" id="estado">
              <option value="" disabled selected >Seleccione la opción</option>
              <option value="Activo">Activo</option>
              <option value="Desactivo">Desactivo</option>
            </select>
        </div>
        
        <input type="hidden" name="iduser" id="id">

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
       

        var nombre= $(this).find("td:eq(1)").text(); 
        document.getElementById('nombre').value=nombre;
        
        var correo= $(this).find("td:eq(2)").text(); 
        document.getElementById('correo').value=correo;

           var Sexo= $(this).find("td:eq(3)").text(); 
            document.getElementById('sexo').value=Sexo;


          var cargo= $(this).find("td:eq(4)").text(); 
        document.getElementById('cargo').value=cargo;

         var estado= $(this).find("td:eq(5)").text(); 
        document.getElementById('estado').value=estado;

         var id= $(this).find("td:eq(0)").text(); 
        document.getElementById('id').value=id;



        var v1= $(this).find("td:eq(0)").text(); 
        document.getElementById('idcat').value=v1;

        var v2= $(this).find("td:eq(1)").text(); 
        document.getElementById('categoriaEli').value=v2;

         
    });    
}





</script>
