<?php
session_start();
$iduser = $_SESSION['IDuser'];
$nombre = $_SESSION['nombre'];
$varCargo = $_SESSION['cargo'];
$img = $_SESSION['IMG'];

 error_reporting(0);
  if ($iduser == null || $iduser = "") {
  	header("Location: ../login.php");
  	die();
  }


   if ($varCargo != 'Administrador') {
    header("Location: ../login.php");
    die();
  }

require_once 'controladores/vistaControlador.php';
require_once '../main/configGeneral.php';
$vt = new vistaControlador();
$vistaR = $vt->obtener_vistas_controlador();
?>

<?php 
include_once 'templates/head.php'; //Inicio de la cabecera
include_once 'templates/style.php'; // estilos css y estilos de letras
?>
<title><?php echo $_GET['vistas'] ?></title> <!--Titulo de la pagina-->
<?php  
include_once 'templates/menuhorizontal.php';
include_once 'templates/menuvertical.php';
?> 


<!-- Contenido de la pagina web -->
<div class="container-fluid">
	


	<?php 
	if($vistaR=="404"){

		require_once("contenidos/404-view.php");			
	} else		
	{
		require_once ($vistaR); 
	}
	?>

</div>
<!-- /.container-fluid -->
<?php 
include_once 'templates/footer.php'; 
include_once 'templates/script.php';   //Todos los script de los archivos de las carpetas js 


 		?>


