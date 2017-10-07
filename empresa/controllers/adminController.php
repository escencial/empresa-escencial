<?php
   class adminController extends Controllers
   {
    private $post;
    private $parametros=array();
    public function __construct()
   	{
   		# cod
   		parent::__construct();
   	}
#########################################################################################################
# Bloque Metodo Link Bitcoin
#########################################################################################################
   	public function codigo()
   	{
      $this->parametros=[
        "varpost" =>false,
      ];
      $post=$this->loadModel('admin');
      $this->_view->posts=$post-> getelementos();
   		$this->_view->titulo='portada';
   		$this->_view->renderizar('codigo',$this->parametros);
   	}

      public function Nuevo_Enlace()
    {
      if (isset($_POST['NombreEnlace'])) {
      $Enlace=$_POST['NombreEnlace'];
      $TipoCobro=$_POST['TipoCobro'];
      $post=$this->loadModel('admin'); 
      $parametros['argumentos']="Dinero_internet";
      $this->_view->posts=$post->InsertarLink( $Enlace,$TipoCobro);
      $this->_view->redireccionar('home','admin',$parametros);
       } 
    }
#########################################################################################################
# Bloque Metodo Compartido
#########################################################################################################     
    function argumento($url)
    {
      $url=explode('/', $url);
      $url=array_filter($url);
      $_controlador=strtolower(array_shift($url));
      $_metodo=strtolower(array_shift($url));
      $_argumentos=$url;
      return  $_argumentos;
    }

    public function Gestion()
    {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $post=$this->loadModel('admin');
      $posts=$post-> getcasas();
      $posts['argumentos']=$arg;
      $this->_view->redireccionar('home','admin',$posts);
    }
#########################################################################################################
# Bloque Metodo Proveedor
#########################################################################################################
   public function Nuevo_Prov()
    {
      if (isset($_POST['NombreProveedor'])) {
      $NomPro=$_POST['NombreProveedor'];
      $DirPro=$_POST['DireccionProveedor'];
      $TelPro=$_POST['TelefonoProveedor'];
      $NitPro=$_POST['NitProveedor'];
      $EmailPro=$_POST['CorreoProveedor'];
      $WebPro=$_POST['WebProveedor']; 
      $post=$this->loadModel('admin'); 
      $posts=$post-> getcasas();
      $this->_view->posts=$post->InsertarProveedor($NomPro,$DirPro,$TelPro,$NitPro,$EmailPro, $WebPro);
      $this->_view->redireccionar('home','admin',$posts);
       } 
    }
#########################################################################################################
# Bloque Metodos Casas
#########################################################################################################
   public function Nueva_Casa()
    {
      if (isset($_POST['NombreCasa'])) {
      $NomPro=$_POST['NombreCasa'];
      $post=$this->loadModel('admin'); 
      $parametros=" ";
      $this->_view->posts=$post->InsertarCasa($NomPro);
      $this->_view->redireccionar('home','admin',$parametros);
       } 
    }
#########################################################################################################
# Bloque Metodos Usuarios
#########################################################################################################
    public function enviar()
    {
      # code...
      //echo "Hola estamos en index";
      if (isset($_POST['NombreProveedor'])) {
     $NomPro=$_POST['NombreProveedor'];
     $DirPro=$_POST['DireccionProveedor'];
     $TelPro=$_POST['TelefonoProveedor'];
     $NitPro=$_POST['NitProveedor'];
     $EmailPro=$_POST['CorreoProveedor'];
     $WebPro=$_POST['WebProveedor']; 
     $post=$this->loadModel('elementos'); 
      $post=$this->getLibrary('PHPMailer','PHPMailerAutoload');
      $email=new PHPMailer();
      //$email->isSMTP();
      //$email->SMTPAuth='';
      
     // $email->port='';

      ////

      //$email->Host='smtp.mailtrap.io';
      //$email->Host='';
      //$email->Host='';

        $email->isSMTP();
        $email->Host = 'smtp.mailtrap.io';
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->CharSet = "UTF-8";
        $email->SMTPSecure='';
        $email->Username = 'cbd6cb582edfaa';
        $email->Password = '41ef10b8afd8bf';

    $email->From = 'escencial2016@gmail.com';
    $email->addAddress($_POST['CorreoProveedor']);
    $email->Subject= 'prueba envio';
    $email->Body = 'Esto es una prueba con ñ';

    /////

    if ($email->send()==false) {
      echo "No se pudo enviar el mensaje";
    } else {
      echo "Mensaje enviado con exito";
    }
    
      $this->_view->posts=$post->InsertarProveedor($NomPro,$DirPro,$TelPro,$NitPro,$EmailPro, $WebPro);
       } 
    }

#########################################################################################################
# Bloque Metodos Productos Terminados
#########################################################################################################
    public function Nuevo_Prod()
    {
      if (isset($_POST['NombreProducto'])) {
      $NomPro=$_POST['NombreProducto'];
      $CodPro=$_POST['CodigoProducto'];
      $CasaPro=$_POST['CasaProducto'];
      $GenerPro=$_POST['GeneroProducto'];
      $PerfilPro=$_POST['PerfilProducto']; 
      $post=$this->loadModel('admin'); 
      $posts=$post->getcasas();
      $posts['argumentos']='Productos';
      $this->_view->posts=$post->InsertarProductos($NomPro,$CasaPro,$GenerPro,$PerfilPro);
      $this->_view->redireccionar('home','admin',$posts);
       } 
    }

    public function Modificar_Producto()
    {
      if (isset($_POST['NombreProducto'])) {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];  
      $NomPro=$_POST['NombreProducto'];
      $CodPro=$_POST['CodigoProducto'];
      $CasaPro=$_POST['CasaProducto'];
      $GenerPro=$_POST['GeneroProducto'];
      $PerfilPro=$_POST['PerfilProducto']; 
      $post=$this->loadModel('admin'); 
      $posts=$post->getcasas();
      $this->_view->posts=$post->UpdateProductos($arg,$NomPro,$CasaPro,$GenerPro,$PerfilPro);
      //$this->_view->redireccionar('home','admin',$posts);
      $parametros=$post->GetProductos();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          echo $NomCasa['nombre'];
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']='ListaProductos';
      $this->_view->redireccionar('home','admin',$parametros);
       } 
    }

    public function Editar_Producto()
    {
     $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $post=$this->loadModel('admin');
      $campos=$post->Editar($arg,'proterminado');
      $parametros=$post->getcasas();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']='EditarProductos';
      $this->_view->redireccionar_editar('home','admin',$parametros,$campos);
    }

    public function Eliminar_Producto()
    {
     $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $post=$this->loadModel('admin');
      $posts=$post-> Borrar($arg,'proterminado');
      $parametros=$post->GetProductos();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          echo $NomCasa['nombre'];
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']='ListaProductos';
      $this->_view->redireccionar('home','admin',$parametros);
     }

    public function Lista_Productos()
    {
      $post=$this->loadModel('admin'); 
      $parametros=$post->GetProductos();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']='ListaProductos';
      $this->_view->redireccionar('home','admin',$parametros);
    }
#########################################################################################################
# Bloque Metodos Materias Primas
#########################################################################################################
     public function Nuevo_MPri()
    {
      if (isset($_POST['NombreProducto'])) {
      $NomPro=$_POST['NombreProducto'];
      $CodPro=$_POST['CodigoProducto'];
      $CasaPro=$_POST['CasaProducto'];
      $GenerPro=$_POST['GeneroProducto'];
      $PerfilPro=$_POST['PerfilProducto']; 
      $post=$this->loadModel('admin'); 
      $posts=$post->getcasas();
      $posts['argumentos']='MPrimas';
      $this->_view->posts=$post->InsertarMprimas($NomPro,$CasaPro,$GenerPro,$PerfilPro);
      $this->_view->redireccionar('home','admin',$posts);
       } 
    }
    
       public function Modificar_MPrima()
    {
      if (isset($_POST['NombreProducto'])) {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];  
      $NomPro=$_POST['NombreProducto'];
      $CodPro=$_POST['CodigoProducto'];
      $CasaPro=$_POST['CasaProducto'];
      $GenerPro=$_POST['GeneroProducto'];
      $PerfilPro=$_POST['PerfilProducto']; 
      $post=$this->loadModel('admin'); 
      $posts=$post->getcasas();
      $this->_view->posts=$post->UpdateMPrimas($arg,$NomPro,$CasaPro,$GenerPro,$PerfilPro);
      //$this->_view->redireccionar('home','admin',$posts);
      $parametros=$post->GetMPrimas();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          echo $NomCasa['nombre'];
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']='ListaMPrimas';
      $this->_view->redireccionar('home','admin',$parametros);
       } 
    }

     public function Eliminar_MPrima()
    {
     $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $post=$this->loadModel('admin');
      $posts=$post-> Borrar($arg,'productos');
      $parametros=$post->GetMPrimas();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']='ListaMPrimas';
      $this->_view->redireccionar('home','admin',$parametros);
     }

     public function Editar_MPrima()
    {
     $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $post=$this->loadModel('admin');
      $campos=$post->EditarMP($arg,'productos');
      $parametros=$post->getcasas();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']='EditarMPrima';
      $this->_view->redireccionar_editar('home','admin',$parametros,$campos);
    }
    
    public function Lista_MPrimas()
    {
      $post=$this->loadModel('admin'); 
      $parametros=$post->GetMPrimas();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']='ListaMPrimas';
      $this->_view->redireccionar('home','admin',$parametros);
    }
#########################################################################################################
# Bloque Metodos Formulacion
#########################################################################################################
  public function Formular()
    {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $post=$this->loadModel('admin');
      $parametros=$post->GetProFormular();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']=$arg;
      $this->_view->redireccionar('home','admin',$parametros);
    }

    public function Formulado()
    {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $post=$this->loadModel('admin');
      $parametros=$post->GetProFormulados();
      for ($i=0; $i <count( $parametros) ; $i++) { 
          $casa= $parametros[$i]['casa'];
          $NomCasa=$post->Casa($casa);
          $parametros[$i]['casa']=$NomCasa['nombre'];
      } 
      $parametros['argumentos']=$arg;
      $this->_view->redireccionar('home','admin',$parametros);
    }

    public function Formulas()
    {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $post=$this->loadModel('admin');
      $parametros=$post->GetMPrimas();
      $Aciertos=0;
      for ($i=0; $i <count($parametros) ; $i++) { 
          $gen= $parametros[$i]['genero'];
          $Pref=$post->GetLetras($gen);
         if ($Pref=='EMP') {  
           $Empaque[$i]['id']= $parametros[$i]['id'];
           $Empaque[$i]['nombre']= $parametros[$i]['nombre'];
           $Empaque[$i]['codproducto']= $parametros[$i]['codproducto'];
           $Empaque[$i]['casa']= $parametros[$i]['casa'];
           $Empaque[$i]['genero']= $parametros[$i]['genero'];
           $Empaque[$i]['perfil']= $parametros[$i]['perfil'];
         }else {
           $Prima[$Aciertos]['id']= $parametros[$i]['id'];
           $Prima[$Aciertos]['nombre']= $parametros[$i]['nombre'];
           $Prima[$Aciertos]['codproducto']= $parametros[$i]['codproducto'];
           $Prima[$Aciertos]['casa']= $parametros[$i]['casa'];
           $Prima[$Aciertos]['genero']= $parametros[$i]['genero'];
           $Prima[$Aciertos]['perfil']= $parametros[$i]['perfil'];
           $Aciertos=$Aciertos+1;
         }
      } 
      $Empaque['argumentos']='Formulas';
      $Empaque['idformula']=$arg;
      $this->_view->redireccionar_editar('home','admin',$Empaque,$Prima);
    }


    
    public function Dosis_Formula()
    {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $Elementos_Empaque=$_POST['MEmpFormula'];
      $Elementos_Mprimas=$_POST['MPriFormula'];
      $post=$this->loadModel('admin');
      for ($i=0; $i <count($Elementos_Empaque) ; $i++) { 
          $Empaque[$i]['id']=$Elementos_Empaque[$i];
          $idformula=$arg;
          $idproducto=$Elementos_Empaque[$i];
          $tipo_producto='empaque';
          $NomMemp=$post->NombreMP($idproducto);
          $Empaque[$i]['nombre']=$NomMemp['nombre'];
          $this->_view->posts=$post->InsertarElemtoFormula($idformula,$idproducto,$tipo_producto);
      }
      for ($j=0; $j<count($Elementos_Mprimas); $j++) { 
          $Prima[$j]['id']=$Elementos_Mprimas[$j];
          $idformula=$arg;
          $idproducto=$Elementos_Mprimas[$j];
          $tipo_producto='mprima';
          $NomMpri=$post->NombreMP($idproducto);
          $Prima[$j]['nombre']=$NomMpri['nombre'];
          $this->_view->posts=$post->InsertarElemtoFormula($idformula,$idproducto,$tipo_producto);
         } 
      $Empaque['argumentos']='Dosificar_Formula';
      $Empaque['idformula']=$arg;
      $this->_view->redireccionar_editar('home','admin',$Empaque,$Prima);
    }


public function Dosificar_Formula()
    {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $emp=$_POST['emp'];
      $mpr=$_POST['mpr'];
      $post=$this->loadModel('admin');
      $IdCompFormulaEmp=$post->GetCompFormulaEmp($arg);
      $IdCompFormulaMpr=$post->GetCompFormulaMpr($arg);
      for ($i=0; $i<count($emp); $i++) { 
          $Porcformula=$emp[$i]; 
          $idproducto=$IdCompFormulaEmp[$i]['idproducto'];
          $Nombre=$post->GetMPrimasFormula($idproducto);
          $Empaque[$i]['nombre']=$Nombre['nombre'];
          $Empaque[$i]['idproducto']=$IdCompFormulaEmp[$i]['idproducto'];
          $Empaque[$i]['tipo_producto']=$IdCompFormulaEmp[$i]['tipo_producto'];
          $Empaque[$i]['porcentaje_formula']=$Porcformula;
          $idformula=$arg;
          $this->_view->posts=$post->UpdateFormula($idformula,$idproducto,$Porcformula);
      }
      for ($i=0; $i<count($mpr); $i++) { 
          $Porcformula=$mpr[$i];
          $idproducto=$IdCompFormulaMpr[$i]['idproducto'];
          $Nombre=$post->GetMPrimasFormula($idproducto);
          $Prima[$i]['nombre']=$Nombre['nombre'];
          $Prima[$i]['idproducto']=$IdCompFormulaMpr[$i]['idproducto'];
          $Prima[$i]['tipo_producto']=$IdCompFormulaMpr[$i]['tipo_producto'];
          $Prima[$i]['porcentaje_formula']=$Porcformula;
          $idformula=$arg;
          $this->_view->posts=$post->UpdateFormula($idformula,$idproducto,$Porcformula);
      }
      $this->_view->posts=$post->ProductoFormulado($idformula);
      $Empaque['argumentos']='ListaComp_Formula';
      $Empaque['idformula']=$arg;
      $this->_view->redireccionar_editar('home','admin',$Empaque,$Prima);
    }///


   public function Editar_Formula ()
    {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $idformula_Comp=explode('-', $arg);
      $idformula=$idformula_Comp[0];
      $idproducto=$idformula_Comp[1];
      $post=$this->loadModel('admin');
      $DatosCompFormula=$post->GetDatosCompFormula($idformula,$idproducto);
      $Nombre=$post->GetMPrimasFormula($idproducto);
      $Empaque['nombre']=$Nombre['nombre'];
      $Empaque['idproducto']=$DatosCompFormula[0]['idproducto'];
      $Empaque['tipo_producto']=$DatosCompFormula[0]['tipo_producto'];
      $Empaque['porcentaje_formula']=$DatosCompFormula[0]['porcentaje_formula'];
      $Empaque['argumentos']='Editar_Componente';
      $Empaque['idformula']=$idformula;
      $Prima['id']='hola';
      $this->_view->redireccionar_editar('home','admin',$Empaque,$Prima);   
    }///

   
 public function ActualizarComp_Formula ()
    {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $idformula_Comp=explode('-', $arg);
      $idformula=$idformula_Comp[0];
      $idproducto=$idformula_Comp[1];
      $Porcformula=$_POST['mpr'];
      $post=$this->loadModel('admin');
      $this->_view->posts=$post->UpdateCompFormula($idformula,$idproducto,$Porcformula);
      $ListaCompFormula=$post-> GetListaCompFormula($idformula);
      $Aciertos=0;
      for ($i=0; $i<count($ListaCompFormula); $i++) {  
          $TipoComp=$ListaCompFormula[$i]['tipo_producto'];
          $idproducto=$ListaCompFormula[$i]['idproducto'];
          if ($TipoComp=='empaque') {
          $Nombre=$post->GetMPrimasFormula($idproducto);
          $Empaque[$i]['nombre']=$Nombre['nombre'];
          $Empaque[$i]['idproducto']=$ListaCompFormula[$i]['idproducto'];
          $Empaque[$i]['tipo_producto']=$ListaCompFormula[$i]['tipo_producto'];
          $Empaque[$i]['porcentaje_formula']=$ListaCompFormula[$i]['porcentaje_formula'];
          } else {
          $Nombre=$post->GetMPrimasFormula($idproducto);
          $Prima[$Aciertos]['nombre']=$Nombre['nombre'];
          $Prima[$Aciertos]['idproducto']=$ListaCompFormula[$i]['idproducto'];
          $Prima[$Aciertos]['tipo_producto']=$ListaCompFormula[$i]['tipo_producto'];
          $Prima[$Aciertos]['porcentaje_formula']=$ListaCompFormula[$i]['porcentaje_formula'];
          $Aciertos=$Aciertos+1;
          }   
      }
      $Empaque['argumentos']='ListaComp_Formula';
      $Empaque['idformula']=$idformula;

      $this->_view->redireccionar_editar('home','admin',$Empaque,$Prima);   
    }///
   
   public function VerListadoFormula ()
    {
      $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $idformula=$arg;
      $post=$this->loadModel('admin');
      $ListaCompFormula=$post-> GetListaCompFormula($idformula);
      $Aciertos=0;
      for ($i=0; $i<count($ListaCompFormula); $i++) {  
          $TipoComp=$ListaCompFormula[$i]['tipo_producto'];
          $idproducto=$ListaCompFormula[$i]['idproducto'];
          if ($TipoComp=='empaque') {
          $Nombre=$post->GetMPrimasFormula($idproducto);
          $Empaque[$i]['nombre']=$Nombre['nombre'];
          $Empaque[$i]['idproducto']=$ListaCompFormula[$i]['idproducto'];
          $Empaque[$i]['tipo_producto']=$ListaCompFormula[$i]['tipo_producto'];
          $Empaque[$i]['porcentaje_formula']=$ListaCompFormula[$i]['porcentaje_formula'];
          } else {
          $Nombre=$post->GetMPrimasFormula($idproducto);
          $Prima[$Aciertos]['nombre']=$Nombre['nombre'];
          $Prima[$Aciertos]['idproducto']=$ListaCompFormula[$i]['idproducto'];
          $Prima[$Aciertos]['tipo_producto']=$ListaCompFormula[$i]['tipo_producto'];
          $Prima[$Aciertos]['porcentaje_formula']=$ListaCompFormula[$i]['porcentaje_formula'];
          $Aciertos=$Aciertos+1;
          }   
      }
      $Empaque['argumentos']='ListaComp_Formula';
      $Empaque['idformula']=$idformula;

      $this->_view->redireccionar_editar('home','admin',$Empaque,$Prima);   
    }///
  
  public function Eliminar_Formula()
    {
     $datos=$_GET['url']; 
      $url=$this->argumento($datos);
      $arg=$url[0];
      $post=$this->loadModel('admin');
      $posts=$post-> Borrar($arg,'productos');
      $idformula=$arg;
      $ListaCompFormula=$post-> GetListaCompFormula($idformula);
      $Aciertos=0;
      for ($i=0; $i<count($ListaCompFormula); $i++) {  
          $TipoComp=$ListaCompFormula[$i]['tipo_producto'];
          $idproducto=$ListaCompFormula[$i]['idproducto'];
          if ($TipoComp=='empaque') {
          $Nombre=$post->GetMPrimasFormula($idproducto);
          $Empaque[$i]['nombre']=$Nombre['nombre'];
          $Empaque[$i]['idproducto']=$ListaCompFormula[$i]['idproducto'];
          $Empaque[$i]['tipo_producto']=$ListaCompFormula[$i]['tipo_producto'];
          $Empaque[$i]['porcentaje_formula']=$ListaCompFormula[$i]['porcentaje_formula'];
          } else {
          $Nombre=$post->GetMPrimasFormula($idproducto);
          $Prima[$Aciertos]['nombre']=$Nombre['nombre'];
          $Prima[$Aciertos]['idproducto']=$ListaCompFormula[$i]['idproducto'];
          $Prima[$Aciertos]['tipo_producto']=$ListaCompFormula[$i]['tipo_producto'];
          $Prima[$Aciertos]['porcentaje_formula']=$ListaCompFormula[$i]['porcentaje_formula'];
          $Aciertos=$Aciertos+1;
          }   
      }
      $Empaque['argumentos']='ListaComp_Formula';
      $Empaque['idformula']=$idformula;

      $this->_view->redireccionar_editar('home','admin',$Empaque,$Prima);
     }

#########################################################################################################
# Bloque Metodos Varios
#########################################################################################################   
    public function elementos2()
    {
      if (isset($_POST['valor_a'])) {
        $a=$_POST['valor_a'];
        $b=$_POST['valor_b'];
        $c=$_POST['valor_c'];
        $result=$a+$b+$c; 
        $Restriccion1=pow($b, 2)-(4*$a*$c);
        $Restriccion2=2*$a;
        if ($Restriccion1>= 0 and $Restriccion2 != 0) {
        $x1=(-1*$b+sqrt($Restriccion1))/ $Restriccion2;
        $x2=(-1*$b-sqrt($Restriccion1))/ $Restriccion2;
         echo "Valor de X1=  ".$x1."</br>";
         echo "Valor de X2=  ".$x2."</br>";
        } else {
         echo "No existen soluciones reales";
        }
      }
     }
#########################################################################################################
# Cierre de Bloques 
#########################################################################################################      
    } 
?>