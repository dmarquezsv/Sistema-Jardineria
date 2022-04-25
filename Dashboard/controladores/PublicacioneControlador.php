<?php 

		include_once '../main/mainModel.php'; 
	/**
	 * 
	 */
	class publicacioneControlador extends mainModel
	{
		
		

		public function RegistrarPublicacionesControlador()
		{
			
			if (isset($_POST['Registrar'])) {
				


				$FechaInicial = $_POST['inicio'];
				$fechaFinal  =$_POST['final'];
				$comentario = $_POST['comentario'];

				$sql = "INSERT INTO `publicaciones` (`FechaInicial`, `FechaFinal` , comentario) VALUES (:FechaInicial, :FechaFinal , :comentario)";
				
				$stmt =  mainModel::conectar()->prepare($sql);

       		$stmt->bindParam(':FechaInicial', $FechaInicial , PDO::PARAM_STR);
       		$stmt->bindParam(':FechaFinal', $fechaFinal , PDO::PARAM_STR);
       		$stmt->bindParam(':comentario', $comentario , PDO::PARAM_STR);

       		if ($stmt->execute()) {

	   				mainModel::alertas("success" , "Se guardado la publicaciones con exito");
	   				return  'success';
	   			} else {
	   				mainModel::alertas("error" , "Fallo al guardar la publicaciones");
	   				return 'error';
	   			}

	   			$stmt->close();


			}

		}


		public function MostrarPublicacionesControlador()
		{

			$sql = "SELECT * FROM publicaciones";

			$stmt = mainModel::ejecutar_consulta_simple($sql);


			while ($item=$stmt->fetch())
			{
				echo "<tr>
				<td>".$item['IDTiempo']."</td>
				<td>".$item['FechaInicial']."</td>
				<td>".$item['FechaFinal']."</td>
				<td>".$item['comentario']."</td>
				<td>  <a href='javascript:void(0)' data-toggle='modal' data-target='#exampleModal2' class='btn btn-info btn-icon-split'><span class='icon text-white-20'><i class='fas fa-exclamation-triangle'></i></span>
				<span class='text'>Actualizar</span></a></td>
				</a>
				</td>
				<td>
				<a href='javascript:void(0)' data-toggle='modal' data-target='#exampleModal1' class='btn btn-danger btn-icon-split'><span class='icon text-white-20'><i class='fas fa-trash'></i></span>
				<span class='text'>Eliminar</span></a></td>
				</a>
				</td>

				</tr>";



			}

		}



		public function EliminarPublicacionesControlador()
		{

			 if(isset($_POST['Eliminar']))
           {
           			
           	$IDProducto = $_POST['idpubliciacion'];
           	$sql = "DELETE FROM `publicaciones` WHERE `IDTiempo` = ?";
           	$stmt = mainModel::ejecutar_consulta_simple_Where($sql ,$IDProducto);

           	if($stmt == true)
           	{
           		mainModel::alertas("success" , "Se Elimino la publicacion con exito");

           	}else
           	{
           		mainModel::alertas("error" , "No se Elimino la publicacion");
           	}

           }

			
		}


		public function ActualizarPublicionControlador ()
		{
			if (isset($_POST['Actualizar'])) {
				
				$FechaInicial = $_POST['inicio'];
				$fechaFinal  =$_POST['final'];
				$comentario = $_POST['comentario'];
				$id = $_POST['idpubliciacion'];

				$sql = "UPDATE `publicaciones` SET FechaInicial = :FechaInicial ,  FechaFinal = :FechaFinal , comentario = :comentario  WHERE `IDTiempo` = :IDTiempo";
		  		$stmt =  mainModel::conectar()->prepare($sql);
		  		$stmt->bindParam(':FechaInicial', $FechaInicial , PDO::PARAM_STR);
	   			$stmt->bindParam(':FechaFinal', $fechaFinal , PDO::PARAM_STR);
	   			$stmt->bindParam(':comentario', $comentario , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDTiempo', $id , PDO::PARAM_STR);

		  		if ($stmt->execute()) {

	   				mainModel::alertas("success" , "Se actualizo la categoria con exito");
	   				return  'success';
	   			} else {
	   				mainModel::alertas("error" , "Fallo actualizar la categoria");
	   				return 'error';
	   			}

	   			$stmt->close();

			}
		}




	}


 ?>