<?php 
   

   define('DS',DIRECTORY_SEPARATOR);
   define('ROOT',realpath(dirname(__FILE__)).DS);
   define('APP_PATH', ROOT.'aplicacion'.DS);

   //try {
   require_once APP_PATH . 'config.php';
   require_once APP_PATH . 'request.php';
   require_once APP_PATH . 'controllers.php';
   require_once APP_PATH . 'view.php';
   require_once APP_PATH . 'Database.php';
   require_once APP_PATH . 'Model.php';
   require_once APP_PATH . 'bootstrap.php';
   require_once APP_PATH . 'session.php';
   //require_once APP_PATH . 'session.php';
   //echo $_GET['url'];

  if ($_GET['url']==null) {
    $controllers=DEFAULT_CONTROLLER;
    $metodo="index";
    $_argumentos="";
    $rutacontrolador=ROOT.'controllers'.DS.$controllers.'Controller'.'.php';
    $peticion=new bootstrap();
    $peticion->run($rutacontrolador,$controllers,$metodo);
     //print_r($peticion->getargs());  
    } else {

    $peticion=new request;  
    $controllers=$peticion->getcontrolador().'Controller';
    $rutacontrolador=ROOT.'controllers'.DS.$controllers.'.php';
    $metodo=$peticion->getmetodo();
     //print_r($peticion->getargs());    
    $peticion=new bootstrap();
    $peticion->run($rutacontrolador,$controllers,$metodo);
   } 


   
   //session::init();
   //echo '<pre>';print_r(get_required_files())
   //$r=new request();
   //echo $r->getcontrolador().'<br>';
   //$peticion=new bootstrap();
   //$peticion->run('clientes');
    //echo $r->getmetodo().'<br>';
   // print_r($r->getargs()); 
   //echo APP_PATH."</br>" ;
   //echo ROOT."</br>";
   //echo DS."</br>";
 ?>


