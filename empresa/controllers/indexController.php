<?php
   class indexController extends Controllers
   {
    private $post;	
    private $parametros=array();
    // private $titulos=array();

    // $array = [
    // "foo" => "bar",
    // "bar" => "foo",
    // ];

    public function __construct()
   	{
   		# cod
   		parent::__construct();
   	}

   	public function index()
   	{
   		# code...
   		//echo "Hola estamos en index";
      $post=$this->loadModel('index');
      $this->_view->posts=$post-> getindex();
   		$this->_view->titulo='portada';
      $this->parametros=[
        "varpost" =>false,
      ];
   		$this->_view->renderizar('index',$this->parametros);
   	}
   }
?>