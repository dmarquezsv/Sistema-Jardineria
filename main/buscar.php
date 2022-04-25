<?php


	include '../main/mainModel.php';  

	$obj = new mainModel();

	$salida = "";

	$sql2 = "SELECT `Titulo` , `descripcion` , `img` , `cantidad` , costo FROM accesorio";

	if (isset($_POST['consulta'])) {
		$dato = $_POST['consulta'];

		$sql2 = "SELECT `Titulo` , `descripcion` , `img` , `cantidad` , costo FROM accesorio 
		       WHERE Titulo LIKE '%$dato%';
		"; 

	}

    $stmt2 = $obj->ejecutar_consulta_simple($sql2); 


    if ($stmt2->rowCount()>0){

    	$salida.= " <table class='table'>
						    <thead class='thead-primary'>
						      <tr class='text-center' >  
						        <th>&nbsp;</th>
						        <th>Producto</th>
						        <th>Precio</th>
						        <th>Disponible</th> 
						      </tr>
						    </thead>
						    <tbody>";


						     while ($item2=$stmt2->fetch()){
           					   
           					$salida.="<tr class='text-center'>
           					   <td class='image-prod'><img src='Dashboard/img/".$item2['img']."'class='img'></td>
           					    <td class='product-name'>
						        	<h3>".$item2['Titulo']."</h3>
						        	<p style='text-align: justify;'>".$item2['descripcion']."</p>
						        </td>
						        <td class='price'>$".$item2['costo']."</td>
						        <td class='total'>".$item2['cantidad']."</td>
						        </tr>";
						    }
						      
						    $salida.="</tbody></table>";



    }else
    {
    	$salida = "No hay datos :(";
    } 

     echo $salida;


 ?>