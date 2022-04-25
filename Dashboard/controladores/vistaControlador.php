<?php 

	require_once("modelos/vistasModelo.php");

	/**
	 * 
	 */
	class vistaControlador extends  vistasModelo
	{
		
		public function obtener_plantilla_controlador()
		{
			require_once("../index.php");
		} //Fin de la funcion


		public function obtener_vistas_controlador()
		{
			if(isset($_GET['vistas']))
			{
				$ruta = explode("/",$_GET['vistas']);
				$Respuestas = vistasModelo::Obtener_Vistas_Modelo($ruta[0]);
			}else
			{
				$Respuestas = "404";
			}

			return $Respuestas;

		}// Fin de la función




	}//Fin de la calses 



 ?>