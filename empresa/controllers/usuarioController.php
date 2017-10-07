<?php
   class usuarioController extends Controllers
   {
      private $registro=array();
      private $post;
      private $ActivarUsuario;
      private $parametros=array();
      private $validacion=array();
      public function __construct()
   	  {
   		# cod
   		parent::__construct();
   	  }
    
      public function registro()
      {
      # code...
      //echo "Hola estamos en index";
       $this->parametros=[
        "varpost" => false,
      ];  
      $post=$this->loadModel('elementos');
      $this->_view->posts=$post-> getelementos();
      $this->_view->titulo='portada';
      $this->_view->renderizar('usuario',$this->parametros);
      }

     

    protected function enviar($CodUser,$EmailUser)
    {
      $post=$this->getLibrary('PHPMailer','PHPMailerAutoload');
      $email=new PHPMailer();
        $email->isSMTP();
        $email->Host = 'smtp.mailtrap.io';
        $email->SMTPAuth = true;
        $email->Port = 2525;
        $email->CharSet = "UTF-8";
        $email->SMTPSecure='';
        $email->Username = 'cbd6cb582edfaa';
        $email->Password = '41ef10b8afd8bf';

    $email->From = 'escencial2016@gmail.com';
    $email->addAddress($EmailUser);
    $email->Subject= 'Codigo Activacion de Cuenta';
    //$mail->Subject = ;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$body  = "<strong>Gracias por registrarse con nosotros</strong><br>";
$body .= "<br>";
$body .='Tu Codigo de Activacion de Cuenta es:'.'<font color="red">'."$CodUser".'</font>';
$body .= "<br>";
$body .= "<strong>Perfumes-Escencial</strong>.<br>";
$email->Body = $body;
//Attach an image file
$imagen=BASE_URL. 'views/layout/'. DEFAULT_LAYOUT . '/img/inicio.jpg';
$email->addAttachment($imagen);
   // $email->Body = 'Esto es una prueba tu codigo de activacion es:'. $CodUser ;

    /////

    if ($email->send()==false) {
       $envio=false; 
    } else {
     $envio=true;
    }
    return $envio;
    }
      
    protected  function get_hash($Pass){
       $bytes = 32;
      // obtener bytes semi-aleatorios
      $salt= substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
      $salt = strtr($salt, array('+' => '.'));
      //$salt=str_shuffle($to_hex);
      $param='$2y$10$' . $salt;
      //return $param;
      return crypt($Pass,$param); 
    }

      protected  function generate_random_key() {
       $chars = "znDSxnNJEu4DkeFpLNBAZYNQ1Q9f1Wabcdefghijklmnopqrstuvwxyz0123456789";
 
       $new_key = "";
       for ($i = 0; $i < 8; $i++) {
        $new_key .= $chars[rand(0,66)];
      }
       return $new_key;
      }

 
/*************************************Metodo registro de usuarios************************************************/    
public function comprobar ($NomUser,$DirUser,$CelUser,$EmailUser,$Cont1User,$Cont2User)
      {
#########################################################################################################
# bloque Verificacion de campos vacios formulario.
#########################################################################################################
      if (!empty($NomUser) and !empty($DirUser) and !empty($CelUser) and !empty($EmailUser) and !empty($Cont1User) and !empty($Cont2User)) {
   ########################################################################################################
   # bloque Verificacion de confimacion contraseñas
   ########################################################################################################
          if ($Cont1User!=$Cont2User) {
            $this->parametros=[
            "varpost" =>true,
            ];
          } else {
            $this->validacion['contra'] = true;
          }   
   ######################################################################################################
   # cierre bloque Verificacion de confimacion contraseñas
   ####################################################################################################### 
  /***********************************************************************************************/ 
   ######################################################################################################
   # Bloque Verificacion codificacion de correo
   ########################################################################################################
    if (filter_var($EmailUser, FILTER_VALIDATE_EMAIL)) {
       $this->validacion['email'] = true;
    }else {    
       $this->parametros['email'] = true;
    }
     /***********************************************************************************************/
     #####################################################################################################
     #  Bloque Verificacion de registro anterior usuario 
     ######################################################################################################    
           $post=$this->loadModel('usuario'); 
           $this->registro=$post->GetUser($EmailUser);
           $VarEmail=$this->registro['E_mail'];        
         if (empty($VarEmail)) {
          $this->validacion['user'] = true;
           ################################################################################################
           #  Bloque ingreso nuevo usuario
           ################################################################################################
           if ($this->validacion['user']==true and $this->validacion['contra']==true and $this->validacion['email'] = true) {
              //echo "Puedes ingresar datos";
              $CodUser=$this->generate_random_key();
              $Pass=$this->get_hash($Cont1User);
              $RolUser='usuario';
              $ActUser='NO ACTIVADO';
              $envio=$this->enviar($CodUser,$EmailUser);
              #############################################################################################
              #  Bloque verificacion de envio codigo a correo nuevo usuario
              ###########################################################################################
              if ($envio==true) {
                 $post=$this->loadModel('usuario'); 
                 $this->_view->posts=$post->InsertarUsuario($NomUser,$EmailUser,$Pass,$RolUser,$CodUser,$CelUser,$DirUser,$ActUser);
                 $this->parametros['contra'] = true;
                 $this->_view->renderizar('codigo',$this->parametros);      
              }  
              #############################################################################################
              #  Cierre bloque verificacion de envio codigo a correo nuevo usuario
              ###########################################################################################  
            } else {
              if ($this->validacion['user']!=true and $this->validacion['contra']!=true) {
                  $this->parametros['user'] = true;
                  $this->parametros['contra'] = true;
              }

              if ($this->validacion['user']!=true ) {
                  $this->parametros['user'] = true;
              }

              if ($this->validacion['contra']!=true ) {
                  $this->parametros['contra'] = true;
              }

              if ($this->validacion['email']!=true ) {
                  $this->parametros['email'] = true;
              }
            
            } 
           ################################################################################################
           # Cierre bloque ingreso nuevo usuario
           ################################################################################################
            } else {
             //echo "Cierre verificacion registro anterior";
             $this->parametros['user'] = true;
           }
           #####################################################################################################
           # Cierre bloque Verificacion de registro anterior usuario 
           ######################################################################################################  
            if ($envio!=true) {
              $this->_view->renderizar('usuario',$this->parametros);
            }

            
          } else {
            $this->parametros['espacios'] = true;
            $this->_view->renderizar('usuario',$this->parametros);
           //echo "Llenar todos los campos";
        }
#########################################################################################################
# bloque Verificacion de campos vacios formulario.
#########################################################################################################  
      } 
/***************************************Cierre metodo comprobacion*********************************************/    
          

      public function validar()
      {

      if (isset($_POST["Nombre"])) {
        $NomUser=trim($_POST["Nombre"]);
        $DirUser=trim($_POST["Direccion"]);
        $CelUser=trim($_POST["Celular"]);
        $EmailUser=trim($_POST["Email"]);
        $Cont1User=trim($_POST["Contrase"]);
        $Cont2User=trim($_POST["Conf_Contrase"]);
       $this->comprobar($NomUser,$DirUser,$CelUser,$EmailUser,$Cont1User,$Cont2User);
      // $this->InsertarUsuario($NomUser,$DirUser,$CelUser,$EmailUser,$Cont1User,$Cont2User);
       /*name="Direccion"
       name="Celular" 
       name="Email" 
       name="Contrase"  
       name="Conf_Contrase"*/ 
        } else {
          $this->parametros['espacios'] = true;
          $this->_view->renderizar('index',$this->parametros);
        }
      //$this->_view->redireccionar('elementos/elementos');
         if (isset($_POST["Usuario"]) and isset($_POST["Contrase"]) and isset($_POST["Codigo"])) {
          $NomUser=trim($_POST["Usuario"]);
          $ContUser=trim($_POST["Contrase"]);
          $CodUser=trim($_POST["Codigo"]); 
          $this->activar($NomUser, $ContUser,$CodUser); 
          }

      }

      protected function activar($NomUser, $ContUser,$CodUser )
      {
        if (!empty($NomUser) and !empty($ContUser) and !empty($CodUser)) {
            
           $post=$this->loadModel('usuario'); 
           $this->registro=$post->GetUserCod($NomUser);
           $VarEmail=$this->registro['E_mail']; 
           $P_ass=$this->registro['P_assWord']; 
           $VarCod=$this->registro['Cod_Validacion']; 
           $VarAct=$this->registro['activacion'];
           
            if (crypt($ContUser, $P_ass) == $P_ass) {
               if ($VarCod==$CodUser) {
                   $ActUsr=$this->loadModel('usuario'); 
                   $this->ActivarUsuario=$ActUsr->ActualizarUser($NomUser,$CodUser);  
                   echo "Has sido activado";         
               } else {
                   echo "No coinciden codigos";
               }
               
            } else {
             echo "no validado"."</br>";
            }  

         } 
        
      }




    }//Cierre Clase 
?>


   