<?php 


include_once '../main/mainModel.php'; 


		
		/**
		 * 
		 */
		class videosControlador extends mainModel
		{
			
			
			public function registrarVideoControlador()
			{
				
				if (isset($_POST['Registrar'])) {
					
					$idCategoria = $_POST['categoria'];
					$Titulo = $_POST['nombre'];
					$Comentario = $_POST['descripcion'];
					$url = $_POST['url'];

					$sql = "INSERT INTO `video` (`IDcategoria`, `Titulo`, `Descripcion`, `url`) VALUES (:IDcategoria, :Titulo, :Descripcion, :url)";


					$stmt =  mainModel::conectar()->prepare($sql);

					$stmt->bindParam(':IDcategoria', $idCategoria , PDO::PARAM_STR);
					$stmt->bindParam(':Titulo', $Titulo , PDO::PARAM_STR);
					$stmt->bindParam(':Descripcion', $Comentario , PDO::PARAM_STR);
					$stmt->bindParam(':url', $url , PDO::PARAM_STR);


					if ($stmt->execute()) {

						mainModel::alertas("success" , "Se guardado el accesorio con exito");
						return  'success';
					} else {
						mainModel::alertas("error" , "Fallo al guardar el accesorio");
						return 'error';
					}

					$stmt->close();


				}

			}




			public function MostrarVideoControlador()
		{
		$sql = "SELECT IDVideo , C.Nombre AS 'Categoria' , Titulo , V.Descripcion , url FROM video V INNER JOIN categoria C ON V.IDcategoria = C.IDcategoria ";

	    	 $stmt = mainModel::ejecutar_consulta_simple($sql);

	    	   while ($item=$stmt->fetch())
              {
                echo "<tr>
                     <td>".$item['IDVideo']."</td>
                      <td>".$item['Categoria']."</td>
                      <td>".$item['Titulo']."</td>
                      <td><a href='?vistas=DetallesVideos&id=".$item['IDVideo']."'class='btn btn-secondary btn-icon-split'><span class='icon text-white-20'><i class='fas fa-info-circle'></i></span>
                      <span class='text'>Detalles</span></a></td>
                      </a></td>
                      <td><a href='javascript:void(0)' data-toggle='modal' data-target='#exampleModal2' class='btn btn-danger btn-icon-split'><span class='icon text-white-20'><i class='fas fa-trash'></i></span>
                      <span class='text'>Eliminar</span></a></td>
                      </a></td>

                    </tr>";



              }
		}





		   public function EliminarAaccesorioControlador()
	    {
           
           if(isset($_POST['Eliminar']))
           {
           			
           	$IDProducto = $_POST['idProducto'];
           	$sql = "DELETE FROM `video` WHERE `IDVideo` = ?";
           	$stmt = mainModel::ejecutar_consulta_simple_Where($sql ,$IDProducto);

           	if($stmt == true)
           	{
           		mainModel::alertas("success" , "Se Elimino el producto con exito");

           	}else
           	{
           		mainModel::alertas("error" , "No se Elimino el producto");
           	}

           }

	    }





	          public function ActualizarAccesorioControlador()
        {
        	if (isset($_POST['Actualizar'])) {
        			
        		$idCategoria = $_POST['categoria'];
        		$Titulo = $_POST['nombre'];
        		$Comentario = $_POST['descripcion'];
        		$url = $_POST['url'];
        		$idVideo = $_POST['idvideo'];

				$sql = "UPDATE `video` SET `IDcategoria` = :IDcategoria, Titulo = :Titulo, `Descripcion` = :Descripcion, `url` = :url  WHERE `IDVideo` = :IDVideo";

				$stmt =  mainModel::conectar()->prepare($sql);

				$stmt->bindParam(':IDcategoria', $idCategoria , PDO::PARAM_STR);
	   			$stmt->bindParam(':Titulo', $Titulo , PDO::PARAM_STR);
	   			$stmt->bindParam(':Descripcion', $Comentario , PDO::PARAM_STR);
	   			$stmt->bindParam(':url', $url , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDVideo', $idVideo , PDO::PARAM_STR);


	   			if ($stmt->execute()) {

	   				mainModel::alertas("success" , "Se actualizo el video con exito");
	   				
	   				return  'success';
	   			} else {
	   				mainModel::alertas("error" , "Fallo al actualizar el video");
	   				return 'error';
	   			}

	   			$stmt->close();


        	}//fIN DEL IF
        }//fIN DEL MEETDO












		}



 ?>