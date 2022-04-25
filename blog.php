<?php 
include 'templates/head.php';?>
<title>blog</title>
<?php include 'templates/style.php'; ?>
<?php include 'templates/MenuHorizontal.php'; ?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-0 bread">Blog</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 ftco-animate">
			<div class="row"> 

 <?php  

      
 	 $sql2 = "SELECT `IDVideo` , C.Nombre AS Categoria , `Titulo` ,V.`Descripcion` , `url` , `FechaPublicado` , img FROM video V INNER JOIN categoria C ON V.IDcategoria = C.IDcategoria ";
     $stmt2 = $obj->ejecutar_consulta_simple($sql2);

     	 while ($item2=$stmt2->fetch()){
           
            echo "<div class='col-md-12 d-flex ftco-animate'>
		            <div class='blog-entry align-self-stretch d-md-flex'>
		            <img src='Dashboard/img/".$item2['img']."' class='block-20'>		              
		              </a>
		              <div class='text d-block pl-md-4'>
		              	<div class='meta mb-3'>
		                  <div><a href='#'>".$item2['FechaPublicado']."</a></div>
		                  <div><a href='#'>Categoria: ".$item2['Categoria']."</a></div>
		                </div>
		                <h3 class='heading'><a href=''>".$item2['Titulo']."</a></h3>
		                <p style='text-align: justify;'>".substr($item2['Descripcion'], 0, 250)." ...</p>
		                <p><a href='blogDetalles.php?id=".$item2['IDVideo']."' class='btn btn-primary py-2 px-3'>Leer más</a></p>
		              </div>
		            </div>
		          </div>";

              
         }

 ?>
		      
			</div>
          </div> <!-- .col-md-8 -->
      </div>
  </div>
</section>



<?php include 'templates/footer.php'; ?>
<?php include 'templates/script.php'; ?>


