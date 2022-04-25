<?php 
	
	   include_once '../main/mainModel.php'; 
	   
	   /**
	    * 
	    */
	   class plantasControladores extends mainModel
	   {



	    public function RegistrarPlantaControlador()
	   {
	   	   
	   		if(isset($_POST['Registrar']))
	   		{
	   			$categoira = $_POST['categoria'];
	   			$Disponible = $_POST['fecha'];
	   			$user = $_POST['iduser'];
	   			$titulo = $_POST['Titulo'];
	   			$Descripcion = $_POST['comentario'];
	   			$Cantidad = $_POST['cantidad'];
	   			$Precio = $_POST['Costo'];

	   			$sql2 = "SELECT COUNT(IDProducto) AS 'Plantas' FROM `producto` WHERE Titulo = ? ";
	   			$stmt2 = mainModel::ejecutar_consulta_simple_Where($sql2 ,$titulo);

	   			while ($item2=$stmt2->fetch()){
	 			$result = $item2['Plantas'] ;
	 		}

	 		if ($result == 1) {
	   				mainModel::alertas("error" , "No se puede registrar debido que el producto que ya existente");
	   				return  'error';
	 		}else{


	   			$sql = "INSERT INTO `producto` (`IDcategoria`, `IDTiempo`, `IDuser`, `Titulo`, `descripcion`, `cantidad`, `costo`) 
	   			VALUES (:IDcategoria , :IDTiempo, :IDuser, :Titulo, :descripcion, :cantidad, :costo)";

	   			$stmt =  mainModel::conectar()->prepare($sql);
	   			$stmt->bindParam(':IDcategoria', $categoira , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDTiempo', $Disponible , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDuser', $user , PDO::PARAM_STR);
	   			$stmt->bindParam(':Titulo', $titulo , PDO::PARAM_STR);
	   			$stmt->bindParam(':descripcion', $Descripcion , PDO::PARAM_STR);
	   			$stmt->bindParam(':cantidad', $Cantidad , PDO::PARAM_STR);
	   			$stmt->bindParam(':costo', $Precio , PDO::PARAM_STR);

	   			if ($stmt->execute()) {

	   				mainModel::alertas("success" , "Se guardado el producto con exito");
	   				return  'success';
	   			} else {
	   				mainModel::alertas("error" , "Fallo al guardar el producto");
	   				return 'error';
	   			}

	   			$stmt->close();

	   		}





	   		}
	   		


	    }




	    public function ActualizarPlantaControlador()
	   {
	   	   
	   		if(isset($_POST['Actualizar']))
	   		{
	   			$categoira = $_POST['categoria'];
	   			$Disponible = $_POST['fecha'];
	   			$user = $_POST['iduser'];
	   			$titulo = $_POST['Titulo'];
	   			$Descripcion = $_POST['comentario'];
	   			$Cantidad = $_POST['cantidad'];
	   			$Precio = $_POST['Costo'];

	   			$IDProducto = $_POST['IDpRODUCTO'];

	   			$sql = "UPDATE `producto` SET `IDcategoria`= :IDcategoria ,`IDTiempo`= :IDTiempo ,`IDuser`= :IDuser,`Titulo`= :Titulo ,`descripcion`= :descripcion ,`cantidad`= :cantidad ,`costo`= :costo WHERE IDProducto = :IDProducto ";

	   			$stmt =  mainModel::conectar()->prepare($sql);
	   			$stmt->bindParam(':IDcategoria', $categoira , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDTiempo', $Disponible , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDuser', $user , PDO::PARAM_STR);
	   			$stmt->bindParam(':Titulo', $titulo , PDO::PARAM_STR);
	   			$stmt->bindParam(':descripcion', $Descripcion , PDO::PARAM_STR);
	   			$stmt->bindParam(':cantidad', $Cantidad , PDO::PARAM_STR);
	   			$stmt->bindParam(':costo', $Precio , PDO::PARAM_STR);
	   			$stmt->bindParam(':IDProducto', $IDProducto , PDO::PARAM_STR);

	   			if ($stmt->execute()) {

	   				mainModel::alertas("success" , "Se actualizo el producto con exito");
	   				return  'success';
	   			} else {
	   				mainModel::alertas("error" , "Fallo al actualizar el producto");
	   				return 'error';
	   			}

	   			$stmt->close();





	   		}
	   		


	    }


	    public function MostrarPlantasControlador()
	    {
	    	$sql = "SELECT `IDProducto` , C.Nombre AS 'Categoria', T.FechaFinal  , U.Nombre AS 'Usuario' , P.Titulo, P.`descripcion` , P.img , P.cantidad , costo FROM producto P INNER JOIN categoria C on P.IDcategoria = C.IDcategoria LEFT JOIN publicaciones  T on P.IDTiempo = T.IDTiempo LEFT JOIN usuarios U on P.IDuser = U.IDuser;";

	    	 $stmt = mainModel::ejecutar_consulta_simple($sql);

	    	   while ($item=$stmt->fetch())
              {
                echo "<tr>
                     <td>".$item['IDProducto']."</td>
                      <td>".$item['Categoria']."</td>
                      <td>".$item['FechaFinal']."</td>
                      <td>".$item['Titulo']."</td>
                      <td>".$item['cantidad']."</td>
                      <td>$".$item['costo']."</td>
                      <td><a href='?vistas=DetallesProducto&id=".$item['IDProducto']."'class='btn btn-secondary btn-icon-split'><span class='icon text-white-20'><i class='fas fa-info-circle'></i></span>
                      <span class='text'>Detalles</span></a></td>
                      </a></td>
                      <td><a href='javascript:void(0)' data-toggle='modal' data-target='#exampleModal2' class='btn btn-danger btn-icon-split'><span class='icon text-white-20'><i class='fas fa-trash'></i></span>
                      <span class='text'>Eliminar</span></a></td>
                      </a></td>

                    </tr>";



              }
	    }



	







	    public function EliminarPlantaControlador()
	    {
           
           if(isset($_POST['Eliminar']))
           {
           			
           	$IDProducto = $_POST['idProducto'];
           	$sql = "DELETE FROM `producto` WHERE `IDProducto` = ?";
           	$stmt = mainModel::ejecutar_consulta_simple_Where($sql ,$IDProducto);

           	if($stmt == true)
           	{
           		mainModel::alertas("success" , "Se Elimino el producto con exito");
           		$destino = "img/".$IDProducto;
 				unlink($destino);

           	}else
           	{
           		mainModel::alertas("error" , "No se Elimino el producto");
           	}

           }

	    }








	   	
	   	
	   }



        





 ?>

