
 <?php


         include_once '../main/mainModel.php'; 


        $respuesta = new mainModel();

        $sql = "SELECT COUNT(IDuser) AS 'Clientes' FROM usuarios WHERE cargo = ? ";
        $stmt = $respuesta->ejecutar_consulta_simple_Where($sql ,"Clientes" );
        while ($item=$stmt->fetch())
        {
         $clientes =  $item['Clientes'];
   
        }

        $sql2 = "SELECT COUNT(IDProducto) AS 'Productos' FROM producto";
        $stmt = $respuesta->ejecutar_consulta_simple($sql2);
        while ($item=$stmt->fetch())
        {
         $productos =  $item['Productos'];
   
        }

        $sql3 = "SELECT COUNT(IDaccesorio) AS 'Articulos' FROM accesorio";
        $stmt = $respuesta->ejecutar_consulta_simple($sql3);
        while ($item=$stmt->fetch())
        {
         $articulos =  $item['Articulos'];
   
        }

        $sql4 = "SELECT COUNT(IDcategoria) AS 'categoria' FROM categoria";
        $stmt = $respuesta->ejecutar_consulta_simple($sql4);
        while ($item=$stmt->fetch())
        {
         $categorias =  $item['categoria'];
   
        }

        $sql5 = "SELECT COUNT(IDVideo) AS 'publicaciones' FROM video";
        $stmt = $respuesta->ejecutar_consulta_simple($sql5);
        while ($item=$stmt->fetch())
        {
         $publicaciones =  $item['publicaciones'];
   
        }


        $sql6 = "SELECT COUNT(IDuser) AS 'Administradores' FROM usuarios WHERE cargo = ? ";
        $stmt = $respuesta->ejecutar_consulta_simple_Where($sql6 ,"Administrador" );
        while ($item=$stmt->fetch())
        {
         $Administradores =  $item['Administradores'];
   
        }


        $sql7 = "SELECT cantidad , costo FROM producto";
        $stmt = $respuesta->ejecutar_consulta_simple($sql7);
        while ($item=$stmt->fetch())
        {
           $cantidad =  $item['cantidad'];
           $costo =  $item['costo'];

           $TotlaCosto =  $cantidad * $costo;

           $TotalDineroProducto = $TotlaCosto + $TotalDineroProducto;
   
        }


         $sql7 = "SELECT cantidad , costo FROM accesorio";
        $stmt = $respuesta->ejecutar_consulta_simple($sql7);
        while ($item=$stmt->fetch())
        {
           $cantidad =  $item['cantidad'];
           $costo =  $item['costo'];

           $TotlaCosto =  $cantidad * $costo;

           $TotalDineroAccesorio = $TotlaCosto + $TotalDineroAccesorio;
   
        }


        $sql9 = "SELECT COUNT(IdNotificacion) AS 'Notificaciones' FROM notificaciones";
        $stmt = $respuesta->ejecutar_consulta_simple($sql9);
        while ($item=$stmt->fetch())
        {
         $Notificaciones =  $item['Notificaciones'];
   
        }


 ?>

<h4 class="h4 mb-0 text-gray-800" style="text-align: center;">Compañia: <?php echo COMPANY; ?> </h4>
<br>
<h4 class="h4 mb-0 text-gray-800" style="text-align: center;"><?php echo SLOGAN; ?> </h4>
<h4 class="h4 mb-0 text-gray-800">Bienvenido: <?php $Nombres = explode(" ", $nombre);echo $Nombres[0]." " .$Nombres[2]; ?> </h4>
 
 <br>

<div class="card text-white bg-primary mb-3">
  <div class="card-header">
   <h4 style="color: black;">Administrativo</h4>
 </div>
 <div class="card-body">

  
  <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Prductos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $productos ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Accesorio</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $articulos ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Clientes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $clientes ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Administradores</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $Administradores ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



<hr>


<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ingresos Productos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$". $TotalDineroProducto ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ingresos Accesorio</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$".$TotalDineroAccesorio ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Publicaciones</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $publicaciones ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Categorias</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $categorias ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


Notificaciones

          <div class="row">
            
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Reporteria</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="reportes/reporestePlantas.php" target="_blank" class="btn btn-primary" >Plantas</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


               <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Reporteria</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="reportes/reporestAccesorio.php" target="_blank" class="btn btn-primary" >Accesorio</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Notificaciones</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="?vistas=notificaciones"  class="btn btn-primary" >Revisar 
                        <?php echo $Notificaciones;  ?>
                      </a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




  
</div>



</div>




<section class="my-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card-group">

        <div class="card card-personal mb-md-0 mb-4">
          <div class="view overlay">
            <img class="card-img-top" src="img/facebook.png" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body">
            <a>
              <h4 class="card-title">Buscanos</h4>
            </a>
            <a href="<?php echo Facebook ?>" class="card-meta">Facebook</a>
              <hr>
          </div>
        </div>
    
        <div class="card card-personal mb-md-0 mb-4">
          <div class="view overlay">
            <img class="card-img-top" src="img/youtube.png" alt="Card image cap" style="height: 100%;">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body">
            <a>
              <h4 class="card-title">Buscanos</h4>
            </a>
            <a href="<?php echo Youtube ?>" class="card-meta">Youtube</a>  
            <hr>
          </div>
        </div>
        <div class="card card-personal mb-md-0 mb-4">
          <div class="view overlay">
            <img class="card-img-top" src="img/instagram.png" alt="Card image cap"  >
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>
          <div class="card-body">
            <a>
              <h4 class="card-title">Buscanos</h4>
            </a>
            <a href="<?php echo Instagram ?>" class="card-meta">Instagram</a>
            <hr>
          </div>
        </div>
        <!-- Card -->

      </div>
      <!-- Card group-->

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
<!-- Section: Group of personal cards -->





   
