<?php
   class usuarioModel extends Model
   {
      
      public function __construct()
      {
           parent::__construct();
      }

      public function GetUser($EmailUser)
      {
         //$elementos=$this->_db->query('select * from clientes');
         //return $elementos->fetchall();
          $parametros = array($EmailUser);
         //$place_holders = implode(',', array_fill(0, count($parámetros), '?'));
          $valores=array(PDO::PARAM_STR);

          $sql ="SELECT E_mail from usuarios where E_mail = ? limit 1";
          $result=Model::query($sql,$parametros,$valores);
          return $result;
      }

     public function GetUserCod($EmailUser)
      {
         //$elementos=$this->_db->query('select * from clientes');
         //return $elementos->fetchall();
          $parametros = array($EmailUser);
         //$place_holders = implode(',', array_fill(0, count($parámetros), '?'));
          $valores=array(PDO::PARAM_STR);

          $sql ="SELECT E_mail,  P_assWord, Cod_Validacion, activacion from usuarios where E_mail = ? limit 1";
          $result=Model::query($sql,$parametros,$valores);
          return $result;
      }      

      public function ActualizarUser($EmailUser,$CodUser)
      {
          
          $EstadoActivacion='NO ACTIVADO';
          $parametros = array($EmailUser,$CodUser, $EstadoActivacion);
          $valores=array(PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR);
          $sql ="UPDATE usuarios SET activacion='ACTIVADO' WHERE E_mail = ? AND Cod_Validacion = ? AND activacion=?";
          $result=Model::Insert($sql,$parametros,$valores);
      }      


      public function InsertarUsuario($NomUser,$EmailUser,$Cont1User,$RolUser,$CodUser,$CelUser,$DirUser,$ActUser)
      {
       $id=null;   
         //$model=new static();
          /*      echo $NomUser."</br>";
                echo $EmailUser."</br>";
                echo $Cont1User."</br>";
                echo $RolUser."</br>";
                echo $CodUser."</br>";
                echo $CelUser."</br>";
                echo $DirUser."</br>";
                echo $ActUser."</br>"; 
                */
      $hoy = date("Y-m-d");
      //echo  $hoy ;         
     $parametros = array($id, $hoy ,$EmailUser,$Cont1User,$CodUser, $RolUser,$ActUser,$CelUser,$DirUser,$NomUser);
      $valores=array(PDO::PARAM_INT, PDO::PARAM_STR,PDO::PARAM_STR,PDO::PARAM_STR,PDO::PARAM_STR, PDO::PARAM_STR,PDO::PARAM_STR,PDO::PARAM_STR,PDO::PARAM_STR,PDO::PARAM_STR);

      $place_holders = implode(',', array_fill(0, count($parametros), '?'));
      $sql ="INSERT INTO usuarios (id, f_registro,E_mail,P_assWord,Cod_Validacion,Privilegio,activacion,telefono,direccion,nombre) VALUES ($place_holders)";
      //echo $sql;
      //echo $parametros;

      $result=Model::Insert($sql,$parametros,$valores);

      }///
   }
?>