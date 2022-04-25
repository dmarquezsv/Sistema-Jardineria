<?php

	
	
	class libreria
	{
		

		public function MenuDinamico()
		{
			
			$arrayAsociativo = array(
					"Inicio" => "index",
					"Servicio" => array(
								"Quinenes Somoss" => "#",
								"Redes Sociales" => "#",
								"Ofertas" => "#",
								"Pedidos" => "#"

							),
					"blog" => "blog",
					"contacto" => "about",
					"contacto" => "contacto",
					"Iniciar Sesión" => "login",
					//Crear sub menu 
					
					
				);

			//Recoremeos el array para poder extraer el la url y el nombre asigando
		foreach ($arrayAsociativo as $Texto => $url) {
			if(is_array($url)) // IsArray devuelve True si la variable es una matriz; en caso contrario, devuelve False.
			{
				echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='dropdown04' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Otros</a>
              <div class='dropdown-menu' aria-labelledby='dropdown04'>";
			

				foreach ($url as $Texto2 => $url2) {
				echo "<a class='dropdown-item' href='".$url2.".php'>".$Texto2."</a>"; // Mostramos el sub menu creado
			
				}
				echo " </div></li>";
			}
			else
			{	// Mostramos la etiqueta con sus respectivo clases de boostrap 4 y el enlace	
				echo "<li class='nav-item'><a href='".$url.".php' class='nav-link'>".$Texto."</a></li>";
			}	
		
		}//Fin del foreach			

	}// Fin del metodo del menu dinimico


	// Funcionamiento de la pagina principal 

		public function header(){
$header = <<< CABECERA

			<!DOCTYPE html>
            <html lang="es">
            <head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
CABECERA;
         echo $header;
}


		public function style()
		{
				$arrayAsociativo = array(
					"fuentes1" => "https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap",
					"fuente2" => "https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap",
					"fuente3" => "https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap",
					"Estilo1" => "css/open-iconic-bootstrap.min.css",
					"Estilo2" => "css/animate.css",
					"Estilo3" => "css/owl.carousel.min.css",
					"Estilo4" => "css/owl.theme.default.min.css",
					"Estilo5" => "css/magnific-popup.css",
					"Estilo6" => "css/aos.css",
					"Estilo7" => "css/ionicons.min.css",
					"Estilo8" => "css/bootstrap-datepicker.css",
					"Estilo9" => "css/jquery.timepicker.css",
					"Estilo10" => "css/flaticon.css",
					"Estilo11" => "css/icomoon.css",
					"Estilo12" => "css/style.css",
					"Estilo13" => "DataTable/css/jquery.dataTables.min.css",
						
				);

				foreach ($arrayAsociativo as $Texto => $url) {

			      echo "<link href='".$url."' rel='stylesheet'>";

				}

		}//Fin del metodo



		public function script()
		{
			$arrayAsociativo = array(

				"script1" => "js/jquery.min.js",
				"script2" => "js/jquery-migrate-3.0.1.min.js",
				"script3" => "js/popper.min.js",
				"script4" => "js/bootstrap.min.js",
				"script5" => "js/jquery.easing.1.3.js",
				"script6" => "js/jquery.waypoints.min.js",
				"script7" => "js/jquery.stellar.min.js",
				"script8" => "js/owl.carousel.min.js",
				"script9" => "js/jquery.magnific-popup.min.js",
				"script10" => "js/aos.js",
				"script11" => "js/jquery.animateNumber.min.js",
				"script12" => "js/bootstrap-datepicker.js",
				"script13" => "js/scrollax.min.js",
				"script14" => "https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false",
				"script15" => "js/google-map.js",
				"script16" => "js/main.js",
				"script17" => "DataTable/js/jquery.dataTables.min.js",
				"script18" => "main/main.js",

			);


			foreach ($arrayAsociativo as $Texto => $url) {

			      echo "<script src='".$url."'></script>";

				}

		}



		
	public function footer()
	{
		$footer = <<< FOOTER

		  <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>    
FOOTER;
 echo $footer;
	}

		


	}// Fin de la clases



?>