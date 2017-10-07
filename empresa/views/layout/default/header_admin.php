    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
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
    <body>
       <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<section id="seccion" class="main row"> 
<aside id="Barralateral"  class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
<div class="nav-side-menu">

   <!--  <div class="brand"><img src="<?php //echo //BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/img/lagarto.png'?>"></div> -->
   <div class="brand">Bienvenido Carlos Mario</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                  <i class="fa fa-dashboard fa-lg"></i> Panel Administrador
                  </a>
                </li>
                
                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-cogs fa-lg"></i> Gestion Productos <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li><a href="<?php echo BASE_URL.'admin'.DS.'Gestion'.DS.'Productos'?>">Nuevo Producto Terminado</a></li>
                    <li><a href="<?php echo BASE_URL.'admin'.DS.'Gestion'.DS.'MPrimas'?>">Nueva MPrima</a></li>
                    <li><a href="<?php echo BASE_URL.'admin'.DS.'Formular'.DS.'ListaFormulacion'?>">Formulacion Productos</a></li>
                </ul>

                <li  data-toggle="collapse" data-target="#product" class="collapsed active">
                  <a href="#"><i class="fa fa-money fa-lg"></i> Compras <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="product">
                    <li><a href="<?php echo BASE_URL.'admin'.DS.'proveedor'?>">Nueva Compra</a></li>
                    <li><a href="#">Compras Pendientes</a></li>
                    <li><a href="#">Nuevo Proveedor</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-recycle fa-lg"></i> Produccion <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <li><a href="#">Nueva Fabricacion</a></li>
                  <li><a href="#">Fabricaciones Pendientes</a></li>
                  <li><a href="#">Inventario PTerminado</a></li>
                  <li><a href="#">Inventario MPrima</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-truck fa-lg"></i> Pedidos <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li><a href="#">Pedidos Facturar</a></li>
                  <li><a href="#">Pedidos Facturar Consignacion</a></li>
                  <li><a href="#">Pedidos Pendientes</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#new3" class="collapsed">
                  <a href="#"><i class="fa fa-briefcase fa-lg"></i> Ventas <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new3">
                  <li><a href="#">Pedidos Facturar</a></li>
                  <li><a href="#">Pedidos Facturar Consignacion</a></li>
                  <li><a href="#">Historico Ventas</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#new2" class="collapsed">
                  <a href="#"><i class="fa fa-bar-chart fa-lg"></i> Reportes <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new2">
                  <li><a href="#">Ventas Mes</a></li>
                  <li><a href="#">Historico Ventas</a></li>
                  <li><a href="#">Grafico Ventas</a></li>
                </ul>


              <!--   <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li>
            </ul>  -->
     </div>
</div>
 </aside>
 <article class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
<div class="container">
  <div class="jumbotron">
    <h1>Fragancias y Perfumes Escencial</h1> 
    <p>Inspiraciones que cautivan</p> 
  </div>