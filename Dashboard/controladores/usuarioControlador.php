<?php 


	
	include_once '../main/mainModel.php'; 
	

	class usuarioControlador extends mainModel
	{
		

		public function MostrarUsuariosControlador()
		{

			$sql = "SELECT * FROM usuarios ";

			$stmt = mainModel::ejecutar_consulta_simple($sql);


			while ($item=$stmt->fetch())
			{
				


			

				echo "<tr>
				<td>".$item['IDuser']."</td>
				<td>".$item['Nombre']."</td>
				<td>".$item['correo']."</td>
				<td>".$item['sexo']. "</td>
				<td>".$item['cargo']."</td>
				<td>".$item['Estado']."</td>
				<td>".$item['FechaCreado']."</td>
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



			public function RegistrarUsuarioControlador()
			{

				if (isset($_POST['Registrar'])) {

				
				$Nombre = $_POST['nombre'];
				$Correo = $_POST['correo'];	
				$Correo = $_POST['correo'];
				$contrasena = $_POST['contra'];
				$Genero = $_POST['sexo'];
				$Cargo = $_POST['cargo'];
				$Estado = $_POST['estado'];

			    $sql2 = "SELECT COUNT(`IDuser`) AS 'Correo' FROM usuarios WHERE correo  = ? ";
			    $stmt2 = mainModel::ejecutar_consulta_simple_Where($sql2 ,$Correo);

			    while ($item2=$stmt2->fetch()){
	 			$result = $item2['Correo'] ;
	 		}

	 		if ($result == 1) {
	 			mainModel::alertas("error" , "No se puede registrar debido al correo ya existente");
			    return 'error';
	 		}else
	 		{


					$Clave = password_hash($contrasena, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente

					$sql = "INSERT INTO `usuarios` (`Nombre`, `correo`, `contrasena`, `sexo`, `cargo`,  `Estado`) VALUES (:Nombre, :correo ,:contrasena, :sexo, :cargo , :Estado)";
					$stmt =  mainModel::conectar()->prepare($sql);

					$stmt->bindParam(':Nombre', $Nombre , PDO::PARAM_STR);
					$stmt->bindParam(':correo', $Correo , PDO::PARAM_STR);
					$stmt->bindParam(':contrasena', $Clave , PDO::PARAM_STR);
					$stmt->bindParam(':sexo', $Genero , PDO::PARAM_STR);
					$stmt->bindParam(':cargo', $Cargo , PDO::PARAM_STR);
					$stmt->bindParam(':Estado', $Estado , PDO::PARAM_STR);

					if ($stmt->execute()) {

						mainModel::alertas("success" , "Se guardado el usuario con exito");
						return  'success';
					} else {
						mainModel::alertas("error" , "Fallo al guardar el usuario");
						return 'error';
					}

					$stmt->close();

					$_POST['Registrar'] == null;
	 			
	 		}

					
					




				}

			}



			public function EliminarUsuarioControlador()
			{

				if(isset($_POST['Eliminar']))
				{

					$iduser = $_POST['idCategoria'];
					$sql = "DELETE FROM `usuarios` WHERE `IDuser` = ?";
					$stmt = mainModel::ejecutar_consulta_simple_Where($sql ,$iduser);

					if($stmt == true)
					{
						mainModel::alertas("success" , "Se Elimino el usuario con exito");
						$destino = "../img/".$iduser;
 				        unlink($destino);

					}else
					{
						mainModel::alertas("error" , "No se Elimino el usuario");
					}

				}


			}



			public function ActualizarPublicionControlador ()
		{
			if (isset($_POST['Actualizar'])) {
				
				$Nombre = $_POST['nombre'];
				$Correo = $_POST['correo'];
				$Genero = $_POST['sexo'];
				$Cargo = $_POST['cargo'];
				$Estado = $_POST['estado'];
				$id = $_POST['iduser'];

				$sql = "UPDATE `usuarios` SET Nombre = :Nombre ,  correo = :correo , cargo = :cargo , sexo = :sexo , Estado = :Estado  WHERE `IDuser` = :IDuser";
		  		$stmt =  mainModel::conectar()->prepare($sql);
		  		$stmt->bindParam(':Nombre', $Nombre , PDO::PARAM_STR);
	   			$stmt->bindParam(':correo', $Correo , PDO::PARAM_STR);
	   			$stmt->bindParam(':cargo', $Cargo , PDO::PARAM_STR);
	   			$stmt->bindParam(':sexo', $Genero , PDO::PARAM_STR);
	   			$stmt->bindParam(':Estado', $Estado , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDuser', $id , PDO::PARAM_STR);

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