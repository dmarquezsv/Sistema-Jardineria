

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0">
          <img src="img/logo.png" style="width: 50px; height: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>

      <!-- Divider -->    
        
     
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <div class="text-center">
         <br>
         <div>
           <img src="img/<?php echo $img ?>"  alt="..." style="width: 50%; height: 50%;"  class="rounded-circle" class="img-responsive"  style="border-radius: 50%;"  >
         </div>
         
       </div>
       <br>

     </li>




     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
      Administración
    </div>


    <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="?vistas=home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>home</span></a>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Jardineria</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Seccione una opción</h6>
            <a class="collapse-item" href="?vistas=producto">Nuevo Planta</a>
            <a class="collapse-item" href="?vistas=categoria">Nueva Categoria</a>
            <a class="collapse-item" href="?vistas=publicaciones">Publicaciones</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Servicio</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Seccione una opción</h6>
            <a class="collapse-item" href="?vistas=accesorio">Nuevo Accesorio</a>
            <a class="collapse-item" href="?vistas=cuido">cuido</a>
            <a class="collapse-item" href="?vistas=usuarios">Usuarios</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
     
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->