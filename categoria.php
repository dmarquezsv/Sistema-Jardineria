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
      $IDcategoria = $_GET['id'];
 	 $sql2 = "SELECT `IDProducto` ,C.`IDcategoria` ,C.Nombre  AS 'Categora', Titulo , img , P.FechaFinal , cantidad FROM producto PR INNER JOIN publicaciones P ON P.IDTiempo = PR.IDTiempo LEFT JOIN categoria C on PR.IDcategoria = C.IDcategoria WHERE P.FechaInicial <= ? AND P.FechaFinal >= ? AND C.IDcategoria = ? ";
     $stmt2 = $obj->conectar()->prepare($sql2);
     $stmt2->execute(array($fechaActual,$fechaActual,$IDcategoria));

 ?>

  <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<h1>Productos de plantas</h1>
    				<div class="cart-list">
	    				<table id="tableproducto" class="table">
						    <thead class="thead-primary">
						      <tr class="text-center" >  
						        <th>&nbsp;</th>
						        <th>Categoria</th>
						        <th>Nombre de la planta</th>
						        <th>Fecha limite</th>
						        <th>Cantidad</th>
						        <th>Detalles</th> 
						      </tr>
						    </thead>
						    <tbody>
						     <?php

						      while ($item2=$stmt2->fetch()){
           					   
           					   echo " <tr class='text-center'>
           					   <td class='image-prod'><img src='Dashboard/img/".$item2['img']."'class='img'></td>

           					     <td class='product-name'>
						        	<h3>".$item2['Categora']."</h3>
						        </td>

           					    <td class='product-name'>
						        	<h3>".$item2['Titulo']."</h3>
						        </td>
						        <td class='product-name'>
						        	<h3>".$item2['FechaFinal']."</h3>
						        </td>
						         <td class='product-name'>
						        	<h3>".$item2['cantidad']."</h3>
						        </td>
						        <td class='total'><a href='DetallesProducto.php?id=".$item2['IDProducto']."' class='btn btn-primary'>Ver Detalles</a></td>

           					   ";}
						      ?>
						    
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>






<?php include 'templates/footer.php'; ?>
<?php include 'templates/script.php'; ?>


