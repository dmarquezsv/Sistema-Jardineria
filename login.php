
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="Dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="Dashboard/css/sb-admin-2.min.css" rel="stylesheet">

  <style type="text/css">
    .bg-login-image {
    background: url(Dashboard/img/ecologia.png);
        background-position-x: 0%;
        background-position-y: 0%;
        background-size: auto;
    background-position: center;
    background-size: cover;
}

  </style>

</head>

<body class="bg-gradient-primary">
  
  <br><br><br><br>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                  </div>
                  <form class="user" action="main/validarLogeo.php" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="correo" name="correo" aria-describedby="emailHelp" placeholder="Introduzca la dirección de correo electrónico...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="contra" name="contra" placeholder="Introduzca la contraseña">
                    </div>
                   
                    <input type="submit" name="validar" value="Iniciar Sesión" class="btn btn-primary btn-user btn-block">
                    
                    <?php 
                    session_start();
                    if (isset($_SESSION['ms1'])) 
                    {

                      echo $_SESSION['ms1'];
                    
                    }

                    if (isset($_SESSION['ms1'])==isset($_SESSION['ms1'])) 
                    {
                      session_destroy();

                      $Vaciar = null;
                      $_SESSION['ms1']=$Vaciar;
                    } 

                     ?>
                    
                    <hr>
                 
                  </form>

                  <a href="index.php" class="btn btn-secondary btn-user btn-block">
                      Regresar
                    </a>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="password.php">Restablecer Contraseña?</a>
                  </div>
                  <div class="text-center">
                    <!--<a class="small" href="register.html">Crear cuenta!</a>-->
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
