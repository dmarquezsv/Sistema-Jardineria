<?php
		


	/**
	 * 
	 */
	class contacto 
	{

		public function RegistrarMensaje()
		{
			if (isset($_POST['Enviar'])) {
				require_once 'mainModel.php';
	             $respuesta = new mainModel();

    		$sql = "INSERT INTO `notificaciones` (`IdNotificacion`, `Nombre`, `Correo`, `Titulo`, `Comentario`) VALUES (NULL, :Nombre, :Correo, :Titulo, :Comentario)";
		     $stmt = $respuesta->conectar()->prepare($sql);


    		$Nombre = $_POST['nombre'];
    		$Corre = $_POST['correo'];
    		$Titulo = $_POST['tiutlo'];
    		$Comentario = $_POST['comentario'];

    	    $stmt->bindParam(':Nombre', $Nombre , PDO::PARAM_STR);
		    $stmt->bindParam(':Correo', $Corre , PDO::PARAM_STR);
		    $stmt->bindParam(':Titulo', $Titulo , PDO::PARAM_STR);
		    $stmt->bindParam(':Comentario', $Comentario , PDO::PARAM_STR);
				
          if ($stmt->execute()) {
					$respuesta->alertas("success" , "Mensaje Enviado");
					return  'success';

				}else {
					$respuesta->alertas("success" , "No se pudo Enviar el mensaje");
					
					
				}

				
     
		}//Fin IF
		
		
	}//Fin de la funcion
}// Fin del la clases
    





?>