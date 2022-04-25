<?php 
include 'templates/head.php';?>
<title>Detalle del Producto</title>
<?php include 'templates/style.php'; ?>
<?php include 'templates/MenuHorizontal.php'; ?>


   <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Producto</span></p>
            <h1 class="mb-0 bread">Detalles Del Producto</h1>
          </div>
        </div>
      </div>
    </div>

    <?php   
    
      
     $IDcategoria = $_GET['id'];
 	 $sql2 = "SELECT `IDProducto` ,C.IDcategoria, C.`IDcategoria` ,C.Nombre AS 'categoria', Titulo , img , P.FechaInicial , P.FechaFinal , P.comentario , cantidad , `costo`,PR.`descripcion` FROM producto PR INNER JOIN publicaciones P ON P.IDTiempo = PR.IDTiempo LEFT JOIN categoria C on PR.IDcategoria = C.IDcategoria WHERE IDProducto =  ? ";
     $stmt2 = $obj->ejecutar_consulta_simple_Where($sql2 ,$IDcategoria);

      	 while ($item2=$stmt2->fetch()){
          $RESULid = $item2['IDcategoria'];
          $Categoria = $item2['categoria'];
          $Titulo = $item2['Titulo'];
          $Descripcion = $item2['descripcion'];
          $FechaPublicado = $item2['FechaInicial'];
          $FechaLimite = $item2['FechaFinal'];
          $comentario = $item2['comentario'];
          $cantidad = $item2['cantidad'];
          $costo  = $item2['costo'];
          $descripcion  = $item2['comentario'];
          $img = $item2['img'];
              
         }
     

 ?>




        <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="Dashboard/img/<?php echo $img; ?>" class="image-popup"><img src="Dashboard/img/<?php echo $img; ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $Titulo; ?> </h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">Categoria <span style="color: #bbb;"><?php echo $Categoria; ?></span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;"><?php echo $cantidad; ?>  <span style="color: #bbb;">Cantidad</span></a>
							</p>
						</div>
    				<p class="price"><span>$<?php echo $costo;  ?></span></p>
    				<p style="text-align: justify;"><?php echo $Descripcion;  ?></p>
    				<p style="text-align: justify;">Fecha Publicado: <?php echo $FechaPublicado;  ?></p>
    				<p style="text-align: justify;">Fecha Limite: <?php echo $FechaLimite;  ?></p>
    				<p style="text-align: justify;">Nota: <?php echo $descripcion;  ?></p>
						
					<div class="row mt-4">
				   <p><a href="categoria.php?id=<?php echo $RESULid ?> " class="btn btn-black py-3 px-5">Regresar</a></p>
    			 </div>
    		</div>
    	</div>
    </section>




<?php include 'templates/footer.php'; ?>
<?php include 'templates/script.php'; ?>
