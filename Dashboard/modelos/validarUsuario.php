
<?php
	
	require_once '../../main/mainModel.php';

	$obj = new mainModel();

	$salida = "";
	$sql2 = "";
	$result ="";	

		if (isset($_POST['consulta'])) {
		
		$dato = $_POST['consulta'];
		$sql2 = "SELECT COUNT(`IDuser`) AS 'Correo' FROM usuarios WHERE correo  LIKE '%$dato%' ";
	}
$stmt2 = $obj->ejecutar_consulta_simple($sql2); 

	 if ($stmt2->rowCount()>0){

	 		while ($item2=$stmt2->fetch()){
	 			$result = $item2['Correo'] ;
	 		}


	 		if ($result == 1) {
	 			$salida.="<br><div class='alert alert-warning' role='alert'>
						  El Usuario ya existe
						 </div>";
	 		}else
	 		{
	 			$salida.="";
	 		}
	 }

	 
	

	   echo $salida;
	
  ?>