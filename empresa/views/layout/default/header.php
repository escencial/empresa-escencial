<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="descripcion" content="Pagina interactiva de enseñanza" />
	<meta name="Keywords" content= "Balance ecuaciones, Reacciones, Caida libre" />
	<title>Fragancias y Perfumes Escencial</title>
	<link href="Estilospyemp.css" rel="stylesheet" type="text/css" media="screen" />
  <link href= "<?php echo $_layoutParams['ruta_css']; ?>EstiloTabla.css" rel="stylesheet" type="text/css" media="screen" />
   <link href= "<?php echo $_layoutParams['ruta_css']; ?>lateral.css" rel="stylesheet" type="text/css" media="screen" />
  <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet"> 
  <script type="text/javascript" src="Balance.js"></script>
  <script type="text/javascript" src= "<?php echo $_layoutParams['ruta_js']; ?>lateral1.js"></script>
</head>
<div class="masthead">
        <h3 class="text-muted">Perfumes Escencial</h3>	
    	<nav class="navbar navbar-light bg-faded rounded mb-3">	    

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <a class="navbar-brand" href="">Menu</a> 
            <label for='listaPro'><?php echo 'Bienvenido'.'  '.$_SESSION["Usuario"]. '  '. 'Escencial'?></label>  
          </button>
          <div class="collapse navbar-toggleable-md" id="navbarCollapse">
            <ul class="nav navbar-nav text-md-center justify-content-md-between">
              <li class="nav-item active">
                <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Acerca de</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL.'elementos'.DS.'codigo'?>">Contatenos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL.'admin'.DS.'Gestion'.DS.'Productos'?>">Iniciar Sesión</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL.'usuario'.DS.'registro'?>">Registrate</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalogo</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="<?php echo BASE_URL.'admin'.DS.'Gestion'.DS.'Dinero_internet'?>">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
                <li class="nav-item">
                <form class="form-inline float-xs-right">
                <input class="form-control" type="text" placeholder="Buscar">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
              </li>
            </ul>
          </div>
        </nav>
      </div>
<body>
