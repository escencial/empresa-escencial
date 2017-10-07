<?php

   class view 
   {
   	private $_controlador;
   	public function __construct()
   	{
   		$peticion=new request;  
      $this->_controlador=$peticion->getcontrolador();
   	}

   public function redireccionar_editar($controlador,$vista,$parametros,$campos){
      $_layoutParams=array(
           'ruta_css'=> BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/css/',
           'ruta_img'=> BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/img/',
           'ruta_js'=> BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/js/',
            'menu'=>$_menu
        );
       $rutaView=ROOT.'views'.DS.$controlador.DS.$vista.'.phtml';
       //echo $rutaView;
       if (is_readable($rutaView)) {
        # code...
        //$v_post=$post;
        
        $ver_vista=$parametros['argumentos'];
        $idformula=$parametros['idformula'];
        unset($parametros['argumentos']);
        unset($parametros['idformula']);
        $casas=$parametros;
        $CamposEdit=$campos;
        include_once ROOT.'views'.DS.'layout'.DS.DEFAULT_LAYOUT.DS.'header_admin.php';
        include_once $rutaView;
        include_once ROOT.'views'.DS.'layout'.DS.DEFAULT_LAYOUT.DS.'footer_admin.php';
       } else {
          throw new Exception("Error Vista");   
       }               
     } //Cierre metodo carga modelo



    public function redireccionar($controlador,$vista,$parametros){
      
      $_layoutParams=array(
           'ruta_css'=> BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/css/',
           'ruta_img'=> BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/img/',
           'ruta_js'=> BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/js/',
            'menu'=>$_menu
        );

       $rutaView=ROOT.'views'.DS.$controlador.DS.$vista.'.phtml';
       //echo $rutaView;
       if (is_readable($rutaView)) {
        # code...
        //$v_post=$post;
        $casas=$parametros;
        $ver_vista=$parametros['argumentos'];
        unset($parametros['argumentos']);
        
        include_once ROOT.'views'.DS.'layout'.DS.DEFAULT_LAYOUT.DS.'header_admin.php';
        include_once $rutaView;
        include_once ROOT.'views'.DS.'layout'.DS.DEFAULT_LAYOUT.DS.'footer_admin.php';
       } else {
          throw new Exception("Error Vista");   
       }               
     } //Cierre metodo carga modelo

    public function renderizar($vista, $post, $item=false)
    {

      if($vista=='index')
      {  
        $this->_controlador='index';
      } else {
        $this->_controlador=$vista;
      }

       $_menu=array(
           array(
           'id'=> 'inicio',
           'titulo'=> 'inicio',
           'enlace'=> BASE_URL
           ),

           array(
           'id'=> 'hola',
           'titulo'=> 'Hola',
           'enlace'=> BASE_URL
           )

        );

       $_layoutParams=array(
           'ruta_css'=> BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/css/',
           'ruta_img'=> BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/img/',
           'ruta_js'=> BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/js/',
            'menu'=>$_menu
       	);

       $rutaView=ROOT.'views'.DS.$this->_controlador.DS.$vista.'.phtml';
      //echo $rutaView;
       if (is_readable($rutaView)) {
       	# code...
        //$v_post=$post;
        $valcont=$post['varpost'];
        $valuser=$post['user'];
        $valespacios=$post['espacios'];
        $valemail=$post['email'];
       	include_once ROOT.'views'.DS.'layout'.DS.DEFAULT_LAYOUT.DS.'header.php';
       	include_once $rutaView;
       	include_once ROOT.'views'.DS.'layout'.DS.DEFAULT_LAYOUT.DS.'footer.php';
       } else {
          throw new Exception("Error Vista");   
       }   	
   	}
    
   }
?>