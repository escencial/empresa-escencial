  <?php
   
  class bootstrap
  {
    
    public static function run($rutacontrolador,$controllers,$metodo)
    {
      //header('Location:http://tomygame.com/?ref=grupoanticrisis');
      if (is_readable($rutacontrolador)) {
        
        require_once $rutacontrolador;
        if ($controllers=='index') {
          $_controlador=$controllers.'Controller';
        } else {
          $_controlador=$controllers;
        }
        if (is_callable(array($controllers,$metodo))) {
          $controllers=new $_controlador;
          $controllers->$metodo();
        } else {
         $controllers=DEFAULT_CONTROLLER;
         $metodo="index";
         $_argumentos="";
         $rutacontrolador=ROOT.'controllers'.DS.$controllers.'Controller'.'.php';
         require_once $rutacontrolador;
         $_controlador=$controllers.'Controller';
         $controllers=new $_controlador;
         $controllers->$metodo();
      }     
        
        //$rutacontrolador;
        
       // echo $rutacontrolador;
        //$controllers=new $_controlador;
        //$controllers->$metodo();
      } else {
         $controllers=DEFAULT_CONTROLLER;
         $metodo="index";
         $_argumentos="";
         $rutacontrolador=ROOT.'controllers'.DS.$controllers.'Controller'.'.php';
         require_once $rutacontrolador;
         $_controlador=$controllers.'Controller';
         $controllers=new $_controlador;
         $controllers->$metodo();
      }     
      // Cierre condicional verificador existencia archivo
    } //Cierre metodo run
  } //Cierre Clase
/* 
        //$arg=$peticion->getargs();
        //$num= count($arg);
        
        
             //Verificar si se puede llamar controlador
       
       ////////////////////////////////////////////////////////////////////////////////////////////////////
       if (is_callable(array($controllers,$metodo))) {
          $peticionx=new request; 
          $metodo=$peticionx->getmetodo();
          echo "Estamos en metodo X";
        } else {
          echo "Estamos en metodo index";
           $metodo='index';
        } 
        if (!empty($peticion->getargs())) {
          call_user_func_array(array($controllers, $metodo),$peticion->getargs());
        } else {
           call_user_func(array($controllers, $metodo ));
        } 
        
        
       ////////////////////////////////////////////////////////7        

      
        }  else { 
          throw new Exception("Metodo no  encontrado");
        } */
?>
