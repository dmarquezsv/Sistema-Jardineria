<?php include 'templates/head.php';?>
<title>Blog Detallado</title>

<?php include 'templates/style.php'; ?>
<?php include 'templates/MenuHorizontal.php'; ?>


<?php

	if (isset($_GET['id'])) {
	

 	 $sql2 = "SELECT `IDVideo` , C.Nombre AS Categoria , `Titulo` ,V.`Descripcion` , `url` , `FechaPublicado` FROM video V INNER JOIN categoria C ON V.IDcategoria = C.IDcategoria WHERE `IDVideo` = ? ";
     $stmt2 = $obj->ejecutar_consulta_simple_Where($sql2 ,$_GET['id'] );

     	 while ($item2=$stmt2->fetch()){
          
          $Categoria = $item2['Categoria'];
          $Titulo = $item2['Titulo'];
          $Descripcion = $item2['Descripcion'];
          $FechaPublicado = $item2['FechaPublicado'];
          $urlvideo = $item2['url'];
              
         }
}

 ?>

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
			

			<h2 class="mb-3" style="text-align: center;"><?php echo $Titulo; ?></h2>
			<hr>
			<h4 class="mb-3" style="text-align: center;">Categoria: <?php echo $Categoria; ?></h4>

			<div class="div_contenedor">
             <center><?php echo $urlvideo; ?></center> 
            </div>
            <br>
            <p style="text-align: justify;"><?php echo $Descripcion; ?></p>
            <p style="text-align: justify;">Publicado: <?php echo $FechaPublicado; ?></p>    
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->


<?php include 'templates/footer.php'; ?>
<?php include 'templates/script.php'; ?>


