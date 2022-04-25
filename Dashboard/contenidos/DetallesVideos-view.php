<?php 

$idVideo = $_GET['id'];

	
 include_once '../main/mainModel.php'; 

$respuesta = new mainModel();


  $sql = "SELECT IDVideo ,C.IDcategoria , C.Nombre AS 'Categoria' , Titulo , V.Descripcion , url , FechaPublicado , img FROM video V INNER JOIN categoria C ON V.IDcategoria = C.IDcategoria";


        $stmt = $respuesta->ejecutar_consulta_simple_Where($sql ,$idVideo );
        while ($item=$stmt->fetch())
        {


         $IDcategoria = $item['IDcategoria'];
         $categoria =  $item['Categoria'];
         $Titulo = $item['Titulo'];
         $Descripcion = $item['Descripcion'];
         $url = $item['url'];
         $FechaPublicado = $item['FechaPublicado'];
         $imgPublic = $item['img'];
       
        }


         $sql = "SELECT IDcategoria , Nombre FROM categoria";
        $stmt = $respuesta->ejecutar_consulta_simple($sql);

        require_once 'controladores/videosControladores.php';

        $respuesta2 = new videosControlador();
        $respuesta2->ActualizarAccesorioControlador();

 ?>


 <div class="card text-center">
  <div class="card-header">
    Detalles del video
  </div>
  <div class="card-body">
  	<h5 class="card-title">Titulo</h5>
    <h5 class="card-title"><?php echo $Titulo ?></h5>
    <p class="card-text">Descripción del video</p>
    <p class="card-text"><?php echo  $Descripcion ?></p>

		<?php echo $url; ?>

		<br>
    
    <a href="?vistas=cuido" class="btn btn-primary">Regresar</a>
  </div>
  <div class="card-footer text-muted">
   Publicado:  <?php echo $FechaPublicado ?>
  </div>
</div>




<div class="card">
  <h5 class="card-header h5">Actualizar Video</h5>
  <div class="card-body">
  

  		<form action="" method="POST">
	 <div class="form-group">
            <label for="exampleFormControlInput1">Categoria</label>
             <select class="form-control" required name="categoria" id="categoria">
              <option value="<?php echo $IDcategoria ?>"  selected ><?php echo $categoria ?></option>
              <?php while ($item=$stmt->fetch())
              {
                echo "<option value=".$item['IDcategoria'].">".$item['Nombre']."</option>";
             }  
             ?>
              
            </select>
          </div>


        	<div class="form-group">
        		<label for="exampleFormControlInput1">Titulo</label>
        		<input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre del titulo" required value="<?php echo $Titulo ?>"> 
        	</div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripción</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"  id="comentario" required><?php echo $Descripcion ?></textarea>
          </div>

           

          <div class="form-group">
            <label for="exampleFormControlTextarea1">url del video</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="url" id="url" required><?php echo $url ?></textarea>
          </div>

          <input type="hidden" name="idvideo" value="<?php echo $_GET['id'] ?>"> 

          <input type="submit" name="Actualizar" value="Actualizar" class="btn btn-success">


	</form>

    <center>
        <img src="img/<?php echo$imgPublic ?>" alt="" style="width: 50%; height: 50%;"  class="img-fluid"/>    
    </center> 
    <br>
 <form method="POST" action="modelos/subirFotoPublicacion.php" enctype="multipart/form-data">

                <input type="file" name="imgusu" id="imgusu" class="form-control" accept="image/*" required />
                <input type="hidden" name="idVideo" value="<?php echo $idVideo ?>">
                <input type="hidden" name="nomimg" value="<?php echo $imgPublic ?>">

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
</div>