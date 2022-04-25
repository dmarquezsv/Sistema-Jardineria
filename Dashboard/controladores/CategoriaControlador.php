<?php 

	
	include_once '../main/mainModel.php'; 

	/**
	 * 
	 */
	class CategoriaControlador extends mainModel
	{
		
		
		public function RegistrarCategoriaControlador()
		{	
			if(isset($_POST['Registrar']))
	   		{
			
			$Nombre = $_POST['nombre'];
			$Descripcion = $_POST['descripcion'];

       		$sql = "INSERT INTO `categoria` (`Nombre`, `Descripcion`) VALUES (:Nombre, :Descripcion)";

       		$stmt =  mainModel::conectar()->prepare($sql);

       		$stmt->bindParam(':Nombre', $Nombre , PDO::PARAM_STR);
       		$stmt->bindParam(':Descripcion', $Descripcion , PDO::PARAM_STR);

       		if ($stmt->execute()) {

	   				mainModel::alertas("success" , "Se guardado la categoria con exito");
	   				return  'success';
	   			} else {
	   				mainModel::alertas("error" , "Fallo al guardar la categoria");
	   				return 'error';
	   			}

	   			$stmt->close();

	   		}



		}


		public function MostrarCategoriaControlador()
		{
			$sql = "SELECT * FROM categoria";

			$stmt = mainModel::ejecutar_consulta_simple($sql);


			while ($item=$stmt->fetch())
			{
				echo "<tr>
				<td>".$item['IDcategoria']."</td>
				<td>".$item['Nombre']."</td>
				<td>".$item['Descripcion']."</td>
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



		 public function ElimminarCategoriaControlador($value='')
		 {
		 	

		 	 if(isset($_POST['Eliminar']))
           {
           			
           	$IDProducto = $_POST['idCategoria'];
           	$sql = "DELETE FROM `categoria` WHERE `IDcategoria` = ?";
           	$stmt = mainModel::ejecutar_consulta_simple_Where($sql ,$IDProducto);

           	if($stmt == true)
           	{
           		mainModel::alertas("success" , "Se Elimino la categora con exito");

           	}else
           	{
           		mainModel::alertas("error" , "No se Elimino la categoria");
           	}

           }



		 }


		  public function ActualizarCategoriaControlador()
		  {

		  	if(isset($_POST['Actualizar']))
		  	{

		  		$IDProducto = $_POST['idCategoria'];
		  		$Nombre = $_POST['nombre'];
		  		$Descripcion = $_POST['descripcion'];
		  		$sql = "UPDATE `categoria` SET `Nombre` = :Nombre ,  Descripcion = :Descripcion WHERE `IDcategoria` = :IDcategoria";
		  		$stmt =  mainModel::conectar()->prepare($sql);
		  		$stmt->bindParam(':Nombre', $Nombre , PDO::PARAM_STR);
	   			$stmt->bindParam(':Descripcion', $Descripcion , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDcategoria', $IDProducto , PDO::PARAM_STR);

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