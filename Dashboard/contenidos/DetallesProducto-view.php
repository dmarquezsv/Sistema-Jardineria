<?php 

    $idProducto = $_GET['id'];

     include_once '../main/mainModel.php'; 

    

      


        $respuesta = new mainModel();

        $sql = "SELECT `IDProducto` , C.Nombre AS 'Categoria',C.IDcategoria , T.IDTiempo, T.FechaFinal , T.FechaInicial  , U.Nombre AS 'Usuario' , P.Titulo, P.`descripcion` , P.img , P.cantidad , costo FROM producto P INNER JOIN categoria C on P.IDcategoria = C.IDcategoria LEFT JOIN publicaciones  T on P.IDTiempo = T.IDTiempo LEFT JOIN usuarios U on P.IDuser = U.IDuser WHERE IDProducto = ?";
        $stmt = $respuesta->ejecutar_consulta_simple_Where($sql ,$idProducto );
        while ($item=$stmt->fetch())
        {

         $idTiempo = $item['IDTiempo'];
         $idcategoria = $item['IDcategoria'];   

         $categoria =  $item['Categoria'];
         $FechaInicial = $item['FechaFinal'];
         $fechaFinal = $item['FechaInicial'];
         $UsuarioIngreso = $item['Usuario'];
         $Nombre =  $item['Titulo'];
         $descripcion = $item['descripcion'];
         $img = $item['img'];
         $costo = $item['costo'];
         $cantida = $item['cantidad'];
   
        }


    
    

    $sql2 = "SELECT IDTiempo,FechaInicial , FechaFinal FROM publicaciones";
    $stmt2 = $respuesta->ejecutar_consulta_simple($sql2);

    $sql3 = "SELECT IDcategoria , Nombre FROM categoria";
    $stmt3 = $respuesta->ejecutar_consulta_simple($sql3);


     include_once 'controladores/plantasControlador.php'; 
     $respuesta = new plantasControladores();

      

 ?>


<?php $respuesta->ActualizarPlantaControlador(); ?>

 <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Detalles del producto</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Actualizar</a>
   
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">



<div class="card">
  <h5 class="card-header h5">Detalles del producto</h5>
  <div class="card-body">
    
  


<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Foto del producto</h5>
      
      <center>
        <img src="img/<?php echo $img ?>" alt="" style="width: 50%; height: 50%;"  class="img-fluid"/>    
      </center> 
    <br>
       <form method="POST" action="modelos/subirFotoPlanta.php" enctype="multipart/form-data">

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
      <a href="?vistas=producto" class="btn btn-secondary" >Regresar</a>

    </div>
  </div>

  
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Observaciones</h5>

        
      <div class="row">
        <div class="col-md-6">
          <label>  Nombre de la planta:</label>
        </div>
        <div class="col-md-6">
          <p><?php echo $Nombre ?></p>
        </div>
      </div>
 

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
          <label>Fecha Inical</label>
        </div>
        <div class="col-md-6">
          <p><?php echo $FechaInicial ?></p>
        </div>
      </div>


      <div class="row">
        <div class="col-md-6">
          <label>Fecha Final</label>
        </div>
        <div class="col-md-6">
          <p><?php echo $fechaFinal ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label>Inscrito por</label>
        </div>
        <div class="col-md-6">
          <p><?php echo $UsuarioIngreso ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label>Descripción</label>
        </div>
        <div class="col-md-6">
          <p style="text-align: justify;"><?php echo $descripcion ?></p>
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


     



    </div>

  </div>

</div>




</div>
</div>







</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <br><br>
  
  <div class="container">
    

    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Fechas</label>
                                            </div>
                                            <div class="col-md-6">
                                              <select class="form-control" required name="fecha" id="sexfechao">
                                                  <option value="<?php echo $idTiempo ?>"  selected  ><?php echo$FechaInicial." - " . $fechaFinal?></option>
                                                  <?php  

                                                  while ($item2=$stmt2->fetch())
                                                  {
                                                    echo "<option value=".$item2['IDTiempo'].">Disponible: ".$item2['FechaInicial']." - ".$item2['FechaFinal']."</option>";
                                                } 
                                                ?>
                                            </select>

                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Categoria</label>
                                            </div>
                                            <div class="col-md-6">
                                             <select class="form-control" required name="categoria" id="categoria">
                                              <option value="<?php echo $idcategoria ?>"  selected ><?php echo $categoria ?></option>
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
                                                <input type="text" class="form-control" name="Titulo" id="Titulo" value="<?php echo $Nombre ?>" placeholder="Nombre del producto">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Comentario</label>
                                            </div>
                                            <div class="col-md-6">
                                                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comentario"><?php echo $descripcion ?></textarea>
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

                                        <input type="hidden" name="iduser" value="<?php echo $_SESSION['IDuser'] ?>">
                                         <input type="hidden" name="IDpRODUCTO" value="<?php echo $idProducto ?>">

                                        <input type="submit" name="Actualizar" class="btn btn-success btn-group-lg" value="Actualizar" >
                                        </form>  

  </div>
  </div>
  
</div>





