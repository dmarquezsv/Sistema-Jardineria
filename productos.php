<?php 
include 'templates/head.php';?>
<title>Productos</title>
<?php include 'templates/style.php'; ?>
<?php include 'templates/MenuHorizontal.php'; ?>

  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Categoria</span></p>
            <h1 class="mb-0 bread">Productos</h1>
          </div>
        </div>
      </div>
    </div>

<?php   
    
     

    
      $fechaActual=date("Y-m-d");
  	 $sql2 = "SELECT `IDProducto` ,C.`IDcategoria` ,C.Nombre AS 'Categora', Titulo , img , P.FechaFinal , cantidad ,`costo` FROM producto PR INNER JOIN publicaciones P ON P.IDTiempo = PR.IDTiempo LEFT JOIN categoria C on PR.IDcategoria = C.IDcategoria WHERE P.FechaInicial <= ? AND P.FechaFinal >= ? ";
     $stmt2 = $obj->conectar()->prepare($sql2);
     $stmt2->execute(array($fechaActual,$fechaActual));

   


 ?>


 

 <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					
    				</ul>
    			</div>
    		</div>
    		<div class="row">


    			<?php

						      while ($item2=$stmt2->fetch()){
           					   
           					   echo "<div class='col-md-6 col-lg-3 ftco-animate'>
           					   <div class='product'>
    					<a href='#' class='img-prod'><img class='img-fluid' src='Dashboard/img/".$item2['img']."' alt='Colorlib Template'>
    						<span class='status'></span>
    						<div class='overlay'></div>
    					</a>
    					<div class='text py-3 pb-4 px-3 text-center'>
    						<h3><a href='#'>".$item2['Titulo']."</a></h3>
    						<h3><a href='#'>".$item2['Categora']."</a></h3>
    						<div class='d-flex'>
    							<div class='pricing'>
		    						<p class='price'><span class='price-sale'>$".$item2['costo']."</span></p>
		    						

		    					</div>
	    					</div>
	    					<div class='bottom-area d-flex px-3'>
	    						<div class='m-auto d-flex'>
	    							<a href='DetallesProducto.php?id=".$item2['IDProducto']."' class='add-to-cart d-flex justify-content-center align-items-center text-center'>
	    								<span><i class='ion-ios-menu'></i></span>
	    							</a>
	    						
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
";
}
           					 
						      ?>

    			
    				
    			
    		


    	
    			
    		

    		
    		
    		
    			
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>






<?php include 'templates/footer.php'; ?>
<?php include 'templates/script.php'; ?>


