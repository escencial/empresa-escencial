<?php  
  class request
  {
      private $_controlador;
      private $_metodo;
      private $_argumentos;
    function __construct()
    {
      
      if (isset($_GET['url'])) {
        # code...
        //$esloquehay=$_GET['url'];

        $url=filter_input(INPUT_GET, 'url',FILTER_SANITIZE_URL);
        
        $url=explode('/', $url);
        $url=array_filter($url);

      $this->_controlador=strtolower(array_shift($url));
      $this->_metodo=strtolower(array_shift($url));
      $this->_argumentos=$url;
      }  
    }
  
    public function getcontrolador(){

     return $this->_controlador;
     // return $url;

    }

    public function getmetodo(){

     return $this->_metodo;

    }

    public function getargs(){
     $this->_argumentos=$_GET['url'];
     return $this->_argumentos;

    }

  }
?>