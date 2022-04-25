<?php 
  
  include_once 'main/mainModel.php';
  $respuesta = new  mainModel();

  
   $RESUTL = 3;
   $CorreoUser;
  


  if (isset($_POST['Buscar'])) 
  {
    $Correo = $_POST['correo'];
    $sql = "SELECT COUNT(IDuser) AS usuario , `correo` FROM usuarios WHERE correo = ?  ";
    $stmt = $respuesta->ejecutar_consulta_simple_Where($sql ,$Correo );
   
    while ($item=$stmt->fetch())
    {
      $RESUTL =  $item['usuario'];
      $CorreoUser = $item['correo'];

     }
    
  }


  if (isset($_POST['Actualizar'])) {

   $password = $_POST['pass'];
   $correo2 = $_POST['correoEma'];

   $Clave = password_hash($password, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente

    $sql = "UPDATE `usuarios` SET  contrasena = :contrasena  WHERE `correo` = :correo";
    $stmt =  $respuesta->conectar()->prepare($sql);

    $stmt->bindParam(':contrasena', $Clave , PDO::PARAM_STR);
    $stmt->bindParam(':correo', $correo2 , PDO::PARAM_STR);

    if ($stmt->execute()) {

      $respuesta->alertas("success" , "Se actualizo la contraseña con exito");
      header("Location: login.php");
      return  'success';
    } else {
      $respuesta->alertas("error" , "Fallo actualizar la contraseña");
      header("Location: login.php");
      return 'error';
    }

    $stmt->close();

    
  }



 ?>
  

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="Dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="Dashboard/css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu contraseña?</h1>
                    <p class="mb-4">Lo entendemos, pasan cosas. Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña.</p>
                  </div>
             
              <?php 

              if( $RESUTL == 1){
                  
                   echo "  <form class='user' action='password.php' method='POST' >
                    <div class='form-group'>

                    <div class='form-group'>
                      <input type='email' class='form-control form-control-user' id='exampleInputEmail' name='correoEma' aria-describedby='emailHelp' placeholder='Enter Email Address...' value='".$CorreoUser."'>
                    </div>

                      <input type='password' class='form-control form-control-user' id='exampleInputEmail' name='pass' aria-describedby='emailHelp' placeholder='Enter Email Address...'>
                    </div>
                      <input type='submit' name='Actualizar' value='cambiar contraseña' class='btn btn-primary btn-user btn-block'>
                    
                  </form>";


              }else if($RESUTL == 0)
              {
                echo "  <form class='user' action='password.php' method='POST' >
                    <div class='form-group'>
                      <input type='email' class='form-control form-control-user' id='exampleInputEmail' name='correo' aria-describedby='emailHelp' placeholder='Enter Email Address...'>
                    </div>
                      <input type='submit' name='Buscar' value='Buscar' class='btn btn-primary btn-user btn-block'>
                      <br>
                      <center><p>Usuario no encontrado</p></center>
                    
                  </form>";


              }else if($RESUTL == 3)
              {
                 echo "  <form class='user' action='password.php' method='POST' >
                    <div class='form-group'>
                      <input type='email' class='form-control form-control-user' id='exampleInputEmail' name='correo' aria-describedby='emailHelp' placeholder='Enter Email Address...'>
                    </div>
                      <input type='submit' name='Buscar' value='Buscar' class='btn btn-primary btn-user btn-block'>

                   
                  </form>";
              }


               ?>


                  <hr>
                  <div class="text-center">
                   
                  </div>
                  <div class="text-center">
                    <a class="small" href="login.php">regresar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="Dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="Dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="Dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="Dashboard/js/sb-admin-2.min.js"></script>

</body>

</html>
