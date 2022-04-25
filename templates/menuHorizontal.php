<?php 

   $sql = "SELECT * FROM `categoria`";
   $stmt = $obj->ejecutar_consulta_simple($sql);

 ?>
<body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	     		
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">

	          <?php $lib->MenuDinamico();  ?>         

	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class='dropdown-item' href='productos.php'>Todos</a>
              	<?php

              	 while ($item=$stmt->fetch())
              {
                if($item['Nombre'] == "Herramientas")
                {
                	echo "<a class='dropdown-item' href='accesorio.php'>Herramientas</a>";
                }else
                {
                  echo "<a class='dropdown-item' href='categoria.php?id=".$item['IDcategoria']."'>".$item['Nombre']."</a>";	
                }

                 
              }

              	 ?>
            
              </div>
            </li>
	          

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->