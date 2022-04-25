
<?php 
    

     $idProducto = $_GET['id'];



     include_once '../main/mainModel.php'; 


     $respuesta = new mainModel();


  $sql = "SELECT IDaccesorio,C.IDcategoria ,C.Nombre AS 'Categoria' ,Titulo,A.descripcion,cantidad,costo ,img FROM accesorio A INNER JOIN categoria C ON A.IDcategoria = C.IDcategoria ";


        $stmt = $respuesta->ejecutar_consulta_simple_Where($sql ,$idProducto );
        while ($item=$stmt->fetch())
        {

         $IDcategoria = $item['IDcategoria'];
         $categoria =  $item['Categoria'];
         $Titulo = $item['Titulo'];
         $Descripcion = $item['descripcion'];
         $img = $item['img'];
         $costo = $item['costo'];
         $cantida = $item['cantidad'];
   
        }



    $sql3 = "SELECT IDcategoria , Nombre FROM categoria";
    $stmt3 = $respuesta->ejecutar_consulta_simple($sql3);



     include_once 'controladores/AccesorioControlador.php'; 
     $respuesta2 = new AccesorioControlador();


 ?>



<?php  $respuesta2->ActualizarAccesorioControlador(); ?>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Detalles</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Actualizar</a>
</div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

      <br><br>

      <div class="card">
          <div class="card-header">
            Detalles del accesorio
        </div>
        <div class="card-body">

            <div class="card-group">
              <div class="card">
                <div class="card-body">

                  <h5 class="card-title">Foto del producto</h5>
                  <br><br>
                  <center>
                      <img src="img/<?php echo $img ?>" alt="" style="width: 50%; height: 50%;"  class="img-fluid" />    
                  </center>
              </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Observaciones</h5>


              <div class="row">
                <div class="col-md-6">
                    <label>Categoria</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo $categoria ?></p>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label>Nombre</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo $Titulo ?></p>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <label>Descripción</label>
                </div>
                <div class="col-md-6">
                    <p style="text-align: justify;"><?php echo $Descripcion ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Costo</label>
                </div>
                <div class="col-md-6">
                    <p>$<?php echo $costo ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Cantidad</label>
                </div>
                <div class="col-md-6">
                    <p><?php echo $cantida ?></p>
                </div>
            </div>

            <br>


            <form method="POST" action="modelos/subirFotoAccesorio.php" enctype="multipart/form-data">

                <input type="file" name="imgusu" id="imgusu" class="form-control" accept="image/*" required />
                <input type="hidden" name="idPLANTA" value="<?php echo $idProducto ?>">
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
          <br>
          <a href="?vistas=accesorio" class="btn btn-secondary" >Regresar</a>



      </div>
  </div>

</div>


</div>
</div>



</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    


<div class="container">
    <br><br>
    <form action="" method="POST">

     <div class="row">
        <div class="col-md-6">
            <label>Categoria</label>
        </div>
        <div class="col-md-6">
           <select class="form-control" required name="categoria" id="categoria">
              <option value="<?php echo $IDcategoria ?>"  selected ><?php echo $categoria ?></option>
              <?php while ($item3=$stmt3->fetch())
              {
                echo "<option value=".$item3['IDcategoria'].">".$item3['Nombre']."</option>";
            }  
            ?>

        </select>
    </div>
</div>




<div class="row">
    <div class="col-md-6">
        <label>Nombre del producto</label>
    </div>
    <div class="col-md-6">
        <input type="text" class="form-control" name="nombre" id="Titulo" value="<?php echo $Titulo ?>" placeholder="Nombre del producto">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label>Comentario</label>
    </div>
    <div class="col-md-6">
       <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comentario"><?php echo $Descripcion ?></textarea>
   </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label>cantidad</label>
    </div>
    <div class="col-md-6">
        <input type="number" class="form-control" name="cantidad" id="cantidad" value="<?php echo $cantida ?>" placeholder="cantidad de producto">
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label>costo</label>
    </div>
    <div class="col-md-6">
        <input type="number" class="form-control" name="Costo" id="Costo"  value="<?php echo $costo ?>" placeholder="Costo del producto">
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <label>Actualizar el producto</label>
    </div>
    <div class="col-md-6">
        <br>
        <input type="submit" name="Actualizar" class="btn btn-success btn-group-lg" value="Actualizar" >
    </div>
</div>


<input type="hidden" name="IDpRODUCTO" value="<?php echo $idProducto ?>">


</form>

</div>



</div>

</div>




