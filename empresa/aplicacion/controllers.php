<?php
   /**
   * 
   */
  class controllers
   { 
      protected $_view;
      protected $_session;

        public function __construct(){

          //$this->_view=new view(new request);

            $request = new request();
            $argumentos=$request->getargs();
            $view = new view($request);
            $this->_view = $view;
            $this->_session= new session();

        }

   	  //public function index();
      //abstract public function elementos();

        protected function loadModel($modelo){
            $modelo=$modelo.'model';
            $rutaModelo=ROOT.'models'. DS. $modelo.'.php';
            
            if (is_readable($rutaModelo)) {
            include_once $rutaModelo;
            $modelo=new $modelo;
            return $modelo;
       } else {
          throw new Exception("Error Modelo");   
       }    
     } //Cierre metodo carga modelo

     
   
     protected function getLibrary($libreria,$archivo){
            //$modelo=$modelo.'model';
            $rutaLibreria=ROOT.'libs'.DS.$libreria.DS.$archivo.'.php';
            //'autoload'
            //echo $rutaLibreria;
            if (is_readable($rutaLibreria)) {
            include_once $rutaLibreria;
            //$modelo=new $modelo;
            //return $modelo;
       } else {
          throw new Exception("Error Libreria");   
       }    
     } //Cierre metodo carga modelo

     protected function getInt($clave){
        if (isset($_POST[$clave]) && !empty($_POST[$clave])) {
        $_POST[$clave]=filter_input(INPUT_POST, $clave,FILTER_VALIDATE_INT);
         return $_POST[$clave];
             } 
        return 0;            
     } //Cierre metodo carga modelo
     
     protected function filtrarInt($int){
       $int=(int) $int;  
       if (is_int($int)) {
                 return $int;
               }   
               else
               {  
                 return 0;
                }  
     } 
    
   } //Cierre clase controlador
?>