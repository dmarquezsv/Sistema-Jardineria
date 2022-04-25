<?php 
	

	/**
	 * 
	 */


	include_once '../main/mainModel.php'; 


	class Notificaciones extends mainModel
	{
			

			public function MostrarNotificaciones()
			{
				$sql = "SELECT * FROM notificaciones";

				 $stmt = mainModel::ejecutar_consulta_simple($sql);

				   while ($item=$stmt->fetch())
              {
                echo "<tr>
                     <td>".$item['IdNotificacion']."</td>
                      <td>".$item['Nombre']."</td>
                      <td>".$item['Correo']."</td>
                      <td>".$item['Titulo']."</td>
                      <td>".$item['Comentario']."</td>
                      <td><a href='javascript:void(0)' data-toggle='modal' data-target='#exampleModal2' class='btn btn-danger btn-icon-split'><span class='icon text-white-20'><i class='fas fa-trash'></i></span>
                      <span class='text'>Eliminar</span></a></td>
                      </a></td>

                    </tr>";



              } // fIN DE WHILE
			}// fIN DEL METODO



			public function EliminarNotificaciones(){

           if(isset($_POST['Eliminar'])) {
           			
           	$IdNotificacion = $_POST['idnoti'];
           	$sql = "DELETE FROM `notificaciones` WHERE `IdNotificacion` = ?";
           	$stmt = mainModel::ejecutar_consulta_simple_Where($sql ,$IdNotificacion);

           	if($stmt == true){
           		mainModel::alertas("success" , "Se Elimino el producto con exito");
           	}else{
           		mainModel::alertas("error" , "No se Elimino el producto");
           	}

           }// Fin del if

	    }//Fin del metodo





		
	}


?>