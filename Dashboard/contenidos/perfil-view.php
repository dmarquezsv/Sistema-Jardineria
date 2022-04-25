<div class="card">
  <div class="card-header">
    Pefil de usuario
  </div>
  <div class="card-body">
   
	
	<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Foto de usuario</h5>
        <div class="text-center">
         <br>
         <img src="img/<?php echo $img ?>" class="rounded" alt="..." style="width: 50%; height: 50%;">

			
		<form method="POST" action="modelos/subirFotoUsuario.php" enctype="multipart/form-data">

        <input type="file" name="imgusu" id="imgusu" class="form-control" accept="image/*" required />
        <input type="hidden" name="idPLANTA" value="<?php echo $_SESSION['IDuser'] ?>">
        <input type="hidden" name="nomimg" value="<?php echo $img ?>">

        <br>
        <br>
        <input type="submit" name="SubirImg" class="btn btn-primary" value="Cambiar imagen">
        <?php 

        if (isset($_SESSION['message'])) 
        {

          echo $_SESSION['message'];

        }

        if (isset($_SESSION['message'])==isset($_SESSION['message'])) 
        {


          $Vaciar = null;
          $_SESSION['message']=$Vaciar;
        } 

        ?>  
      </form>


       </div>
       <br>
    </div>
  </div>


  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Datos</h5>
      
     <div class="row">
      	<div class="col-md-6">
      		<label>Codigo:</label>
      	</div>
      	<div class="col-md-6">
      		<p><?php echo $_SESSION['IDuser'] ?></p>
      	</div>
      </div>
  
	

      <div class="row">
      	<div class="col-md-6">
      		<label>Nombre:</label>
      	</div>
      	<div class="col-md-6">
      		<p><?php echo $nombre ?></p>
      	</div>
      </div>


       <div class="row">
      	<div class="col-md-6">
      		<label>Cargo:</label>
      	</div>
      	<div class="col-md-6">
      		<p><?php echo $varCargo ?></p>
      	</div>
      </div>

		




    </div>
  </div>
  
</div>


  </div>
</div>