<?php 


	class vistasModelo 
	{
		
		protected function Obtener_Vistas_Modelo($vistas)
		{

			//Contenidos de existentes
$listaContenido = ["home","usuarios","producto" , "categoria" , "cuido" , "accesorio" ,"publicaciones" , "DetallesProducto","DetallesAccesorio" , "DetallesVideos" , "perfil",
"notificaciones"];

				//Vericar los contenidos
				if(in_array($vistas,$listaContenido))
				{	
				//IS FILE PARA VERIFICAR QUE EL CONTENIDO EXISTA
					if(is_file("contenidos/".$vistas."-view.php"))
					{

					$contenido = "contenidos/".$vistas."-view.php"; // Retorne el contenido obtenido
				}
				else
				{
					$contenido = "404"; 
				}

			}else
			{
				$contenido = "404"; 
			}

			return $contenido;

		} // Fin del metodo

		
	} // Fin dela clases





 ?>