<?php 

  include_once 'conexion.php';


  class mainModel 
  {
  	
  	
  	public function conectar()
  	{

  		try {

  			$con = new PDO(SGBD,Usuario,Pass);
  			

  		} catch (PDOException $e) {
  			echo 'Falló la conexión: ' . $e->getMessage();
  		}

  		return $con;
  	}


  		public function ejecutar_consulta_simple($consulta)
		{

			try {

				$respuesta = mainModel::conectar()->prepare($consulta);
				$respuesta-> execute();
				return $respuesta;
			}
			catch  (PDOException $e) {
				
				echo 'Falló la conexión: ' . $e->getMessage();
			}
		}



		public function ejecutar_consulta_simple_Where($consulta, $condicion)
		{

			try {

				$respuesta = mainModel::conectar()->prepare($consulta);
				$respuesta-> execute(array($condicion));
				return $respuesta;
			}
			catch  (PDOException $e) {
				
				echo 'Falló la conexión: ' . $e->getMessage();
			}
		}


		public function alertas($tipo , $mensaje )
		{

		  if($tipo =="success")
		  {	
		  		 echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
			<strong><i class='fas fa-flag'></i></strong>" .$mensaje.".
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>";

		  }else if($tipo == "error")
		  {
		  	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
		    <strong><i class='fas fa-exclamation-triangle'></i></strong>".$mensaje.".
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>";

		  }

		}




  } // Fin de la clases





 ?>