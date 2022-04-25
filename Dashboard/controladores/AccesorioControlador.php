<?php 

	
	include_once '../main/mainModel.php'; 


	/**
	 * 
	 */
	class AccesorioControlador extends mainModel
	{
		
		

		public function RegistrarAccesorioControler()
		{
			if (isset($_POST['Registrar'])) {
				
			    	
			$categoria = $_POST['categoria'];
			$Titulo = $_POST['Titulo'];
			$descrip = $_POST['comentario'];
			$cantidad = $_POST['cantidad'];
			$costo = $_POST['Costo'];

			$sql2 = "SELECT COUNT(`IDaccesorio`) AS 'accesorios' FROM accesorio WHERE Titulo  = ? ";
			 $stmt2 = mainModel::ejecutar_consulta_simple_Where($sql2 ,$Titulo); 

			

	 		while ($item2=$stmt2->fetch()){
	 			$result = $item2['accesorios'] ;
	 		}


	 		if ($result == 1) {
	 			
	 			mainModel::alertas("error" , "Fallo al registrar el producto debido que ya existe en el inventario");
					return 'error';
	 		}else{


	 			$sql = "INSERT INTO `accesorio` (`IDcategoria`, `Titulo` , descripcion , cantidad , costo) VALUES (:IDcategoria, :Titulo , :descripcion , :cantidad , :costo)";
				
				$stmt =  mainModel::conectar()->prepare($sql);

				$stmt->bindParam(':IDcategoria', $categoria , PDO::PARAM_STR);
				$stmt->bindParam(':Titulo', $Titulo , PDO::PARAM_STR);
				$stmt->bindParam(':descripcion', $descrip , PDO::PARAM_STR);
				$stmt->bindParam(':cantidad', $cantidad , PDO::PARAM_STR);
				$stmt->bindParam(':costo', $costo , PDO::PARAM_STR);

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
		}






		public function MostrarAccesorioControlador()
		{
		$sql = "SELECT IDaccesorio,C.Nombre AS 'Categoria' ,Titulo,A.descripcion,cantidad,costo FROM accesorio A INNER JOIN categoria C ON A.IDcategoria = C.IDcategoria ";

	    	 $stmt = mainModel::ejecutar_consulta_simple($sql);

	    	   while ($item=$stmt->fetch())
              {
                echo "<tr>
                     <td>".$item['IDaccesorio']."</td>
                      <td>".$item['Categoria']."</td>
                      
                      <td>".$item['Titulo']."</td>
                      <td>".$item['cantidad']."</td>
                      <td>$".$item['costo']."</td>
                      <td><a href='?vistas=DetallesAccesorio&id=".$item['IDaccesorio']."'class='btn btn-secondary btn-icon-split'><span class='icon text-white-20'><i class='fas fa-info-circle'></i></span>
                      <span class='text'>Detalles</span></a></td>
                      </a></td>
                      <td><a href='javascript:void(0)' data-toggle='modal' data-target='#exampleModal2' class='btn btn-danger btn-icon-split'><span class='icon text-white-20'><i class='fas fa-trash'></i></span>
                      <span class='text'>Eliminar</span></a></td>
                      </a></td>

                    </tr>";



              }
		}



        public function ActualizarAccesorioControlador()
        {
        	if (isset($_POST['Actualizar'])) {
        			
        		$idCategoria = $_POST['categoria'];
				$nombre = $_POST['nombre'];
				$comentario  = $_POST['comentario'];
				$cantidad = $_POST['cantidad'];
				$costo = $_POST['Costo'];
				$IDaccesorio = $_POST['IDpRODUCTO'];

				$sql = "UPDATE `accesorio` SET `IDcategoria` = :IDcategoria, Titulo = :Titulo, `descripcion` = :descripcion, `cantidad` = :cantidad, `costo` = :costo WHERE `IDaccesorio` = :IDaccesorio";

				$stmt =  mainModel::conectar()->prepare($sql);

				$stmt->bindParam(':IDcategoria', $idCategoria , PDO::PARAM_STR);
	   			$stmt->bindParam(':Titulo', $nombre , PDO::PARAM_STR);
	   			$stmt->bindParam(':descripcion', $comentario , PDO::PARAM_STR);
	   			$stmt->bindParam(':cantidad', $cantidad , PDO::PARAM_STR);
	   			$stmt->bindParam(':costo', $costo , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDaccesorio', $IDaccesorio , PDO::PARAM_STR);


	   			if ($stmt->execute()) {

	   				mainModel::alertas("success" , "Se actualizo la categoria con exito");
	   				return  'success';
	   			} else {
	   				mainModel::alertas("error" , "Fallo al actualizar la categoria");
	   				return 'error';
	   			}

	   			$stmt->close();


        	}//fIN DEL IF
        }//fIN DEL MEETDO




	    public function EliminarAaccesorioControlador()
	    {
           
           if(isset($_POST['Eliminar']))
           {
           			
           	$IDProducto = $_POST['idProducto'];
           	$sql = "DELETE FROM `accesorio` WHERE `IDaccesorio` = ?";
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







		
	}
 

 ?>