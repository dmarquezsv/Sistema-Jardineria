<?php 

if (isset($_POST['validar'])) 
{

	require_once 'mainModel.php';

	$respuesta = new mainModel();

	$Correo	= $_POST['correo'];
	$password = $_POST['contra'];

	$sql = "SELECT IDuser , Nombre , correo , contrasena , cargo , Estado , img FROM usuarios WHERE correo = ? ";
	$stmt = $respuesta->ejecutar_consulta_simple_Where($sql ,$Correo );

	$ObtnerCorreo = "";
	$ObtnerContra;
	$obtenerEstado;
	$obtenerCargo;
	$obterNomber;
	$obtenerId;
	$obtenerIMG;

	while ($item=$stmt->fetch())
	{
		$obtenerId =  $item['IDuser'];
		$ObtnerCorreo =  $item['correo'];
		$ObtnerContra =  $item['contrasena'];
		$obtenerEstado =  $item['Estado'];
		$obtenerCargo =  $item['cargo'];
		$obterNomber =  $item['Nombre'];
		$obtenerIMG = $item['img'];
	}

	if ($ObtnerCorreo == $Correo && password_verify($password, $ObtnerContra)) 
	{
		if($obtenerEstado == "Desactivo")
		{
			session_start();
			header("Location: ../login.php");
			$_SESSION['ms1'] = "<br><center><h6>ACCESO DENEGADO</h6></center>";
		}
		else
		{
			switch ($obtenerCargo) {
				case 'Administrador':
				session_start();
				$_SESSION['IDuser'] = $obtenerId;
				$_SESSION['nombre'] = $obterNomber;
				$_SESSION['cargo'] = $obtenerCargo;
				$_SESSION['IMG'] = $obtenerIMG;
				header("Location: ../Dashboard?vistas=home");
				
				break;

				case 'Cliente':
				echo "Cliente " . $obterNomber;
				break;

			}

		}

	}else
	{	
		session_start();
		header("Location: ../login.php");
		$_SESSION['ms1'] = "<br><center><h6>Contraseña mala o correo</h6></center>";
		
	}




}else
{
	echo "Problemas al cargar validar logeo";
}
?>