<?php
   class adminModel extends Model
   {
      
      public function __construct()
      {
           parent::__construct();
      }
#########################################################################################################
# Bloque Metodo Link Bitcoin
#########################################################################################################
      public function InsertarLink($Link,$tipo)
      {
       $id=null;            
      $parametros = array($id, $Link,$tipo);
      $valores=array(PDO::PARAM_INT, PDO::PARAM_STR, PDO::PARAM_STR);

      $place_holders = implode(',', array_fill(0, count($parametros), '?'));
      $sql ="INSERT INTO link_dinero (id, bitcoin, dolar_euro) VALUES ($place_holders)";
      $result=Model::Insert($sql,$parametros,$valores);
      }/// 

       public function Enlace($id)
      {
          $parametros = array($id);
          $valores=array(PDO::PARAM_INT);
          $sql ="SELECT bitcoin from link_dinero  where id=? limit 1;";
          $result=Model::query($sql,$parametros,$valores);
          return $result;
      } 
#########################################################################################################
# Bloque Metodo Compartido
######################################################################################################### 
     public function Borrar($id,$nomtabla)
      {
          $parametros = array($id);
          $valores=array(PDO::PARAM_INT);
          $sql ="DELETE  from $nomtabla where id=? limit 1;";
          $result=Model::query($sql,$parametros,$valores);
      } 
#########################################################################################################
# Bloque Metodo Proveedor
#########################################################################################################
    public function InsertarProveedor($NomPro,$DirPro,$TelPro,$NitPro,$EmailPro,$WebPro)
      {
       $id=null;   
      $parámetros = array($id, $NomPro,$DirPro,$TelPro,$NitPro,$EmailPro,$WebPro);
      $place_holders = implode(',', array_fill(0, count($parámetros), '?'));
      $sql ="INSERT INTO proveedores (id, nombre,direccion,telefono,nit,correo,web) VALUES ($place_holders)";
      $result=Model::Insert($sql,$parámetros);
      }
#########################################################################################################
# Bloque Metodos Casas
#########################################################################################################
      public function InsertarCasa($NomUser)
      {
       $id=null;            
      $parametros = array($id, $NomUser);
      $valores=array(PDO::PARAM_INT, PDO::PARAM_STR);

      $place_holders = implode(',', array_fill(0, count($parametros), '?'));
      $sql ="INSERT INTO casa (id, nombre) VALUES ($place_holders)";
      $result=Model::Insert($sql,$parametros,$valores);
      }//

      public function Casa($id)
      {
          $parametros = array($id);
          $valores=array(PDO::PARAM_INT);
          $sql ="SELECT nombre from casa  where id=? limit 1;";
          $result=Model::query($sql,$parametros,$valores);
          return $result;
       }

      public function GetCasas()
      {
         $casa=$this->_db->query('select * from casa');
         return $casa->fetchall();
      }
#########################################################################################################
# Bloque Metodos Productos Terminados
#########################################################################################################
      public function InsertarProductos($NomPro,$CasaPro,$GenerPro,$PerfilPro)
      {
       $id=null; 
       $Max=$this->GetMaxPT();
       $h=$Max[0]['maximo'];
       $cons=$h+1;
       if ($GenerPro=="Femenino") {
           $CodPro='PT-F'.$cons;
       } else {
            $CodPro='PT-M'.$cons;
       }
      $formulacion='Formular'; 
      $valores=array(PDO::PARAM_INT, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR ,PDO::PARAM_STR);
      $parámetros = array($id, $NomPro,$CodPro,$CasaPro,$GenerPro,$PerfilPro,$formulacion);
      $place_holders = implode(',', array_fill(0, count($parámetros), '?'));
      $sql ="INSERT INTO proterminado (id, nombre ,codproducto,casa ,genero ,perfil,formulacion) VALUES ($place_holders)";
      $result=Model::Insert($sql,$parámetros);
      }///
      
      public function Editar($id,$nomtabla)
      {
          $parametros = array($id);
          $valores=array(PDO::PARAM_INT);
          $sql ="SELECT id, nombre, codproducto, casa, genero, perfil from $nomtabla where id=? limit 1;";
          $result=Model::query($sql,$parametros,$valores);
          return $result;
      }
      
      public function UpdateProductos($arg,$NomPro,$CasaPro,$GenerPro,$PerfilPro)
      {
       $id=$arg; 
       $cons=$id;
       if ($GenerPro=="Femenino") {
           $CodPro='PT-F'.$cons;
       } else {
            $CodPro='PT-M'.$cons;
       }

      $parámetros = array($NomPro,$CodPro,$CasaPro,$GenerPro,$PerfilPro,$id);
      $valores=array(PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR,PDO::PARAM_INT);
      //$place_holders = implode(',', array_fill(0, count($parámetros), '?'));
      $sql ="UPDATE proterminado SET  nombre=? ,codproducto=?,casa=? ,genero=? ,perfil=? WHERE id=?";
      $result=Model::Insert($sql,$parámetros,$valores);
      }///

       public function GetMaxPT()
      {
         $max=$this->_db->query('select max(id) as maximo from proterminado;');
         return $max->fetchall();
      }

      public function GetProductos()
      {
         $index=$this->_db->query('select * from proterminado;');
         return $index->fetchall();
      }

#########################################################################################################
# Bloque Metodos Materias Primas
#########################################################################################################
      public function InsertarMprimas($NomPro,$CasaPro,$GenerPro,$PerfilPro)
      {
       $id=null; 
       $Max=$this->GetMaxMP();
       $h=$Max[0]['maximo'];
       $cons=$h+1;
       $Prefijo=$this->GetPrefijo($GenerPro);
       $CodPro='MP-'.$Prefijo.$cons;
       $valores=array(PDO::PARAM_INT, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR);
       $parámetros = array($id, $NomPro,$CodPro,$CasaPro,$GenerPro,$PerfilPro);
       $place_holders = implode(',', array_fill(0, count($parámetros), '?'));
       $sql ="INSERT INTO productos (id, nombre ,codproducto,casa ,genero ,perfil) VALUES ($place_holders)";
       $result=Model::Insert($sql,$parámetros,$valores);
      }///
      
      public function EditarMP($id,$nomtabla)
      {
          $parametros = array($id);
          $valores=array(PDO::PARAM_INT);
          $sql ="SELECT id, nombre, codproducto, casa, genero, perfil from $nomtabla where id=? limit 1;";
          $result=Model::query($sql,$parametros,$valores);
          return $result;
      }
      
        public function GetPrefijo($GenerPro)
      {
         $rest = substr($GenerPro, 0, 3);
         return $rest;
      }

      public function UpdateMPrimas($arg,$NomPro,$CasaPro,$GenerPro,$PerfilPro)
      {
       $id=$arg; 
       $cons=$id;
       $Prefijo=$this->GetPrefijo($GenerPro);
       $CodPro='MP-'.$Prefijo.$cons;
      $parámetros = array($NomPro,$CodPro,$CasaPro,$GenerPro,$PerfilPro,$id);
      $valores=array(PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_INT);
      //$place_holders = implode(',', array_fill(0, count($parámetros), '?'));
      $sql ="UPDATE productos SET  nombre=? ,codproducto=?,casa=? ,genero=? ,perfil=? WHERE id=?";
      $result=Model::Insert($sql,$parámetros,$valores);
      }///
      
      public function GetMPrimas()
      {
          $index=$this->_db->query('SELECT id, nombre, codproducto, casa, genero, perfil from productos;');
          return $index->fetchall();
      }

      public function GetMaxMP()
      {
         $max=$this->_db->query('select max(id) as maximo from productos;');
         return $max->fetchall();
      } 

      public function GetLetras($GenerPro)
      {
         $rest = substr($GenerPro, 0, 3);
         return $rest;
      } 

      public function NombreMP($id)
      {
          $parametros = array($id);
          $valores=array(PDO::PARAM_INT);
          $sql ="SELECT nombre from productos  where id=? limit 1;";
          $result=Model::query($sql,$parametros,$valores);
          return $result;
       }
#########################################################################################################
# Bloque Metodos Formulacion
#########################################################################################################
     public function GetProFormular()
      {
          $index=$this->_db->query("SELECT id, nombre, codproducto, casa, genero, perfil from proterminado where formulacion='Formular';");
          return $index->fetchall();
      } 

      public function GetProFormulados()
      {
          $index=$this->_db->query("SELECT id, nombre, codproducto, casa, genero, perfil from proterminado where formulacion='formulado';");
          return $index->fetchall();
      }   

      public function GetCompFormulaEmp($id)
      {
       
        $index=$this->_db->prepare('SELECT idproducto, tipo_producto, porcentaje_formula from formula where idformula=? and tipo_producto="empaque"');
        $index->execute(array($id));
        $result = $index->fetchAll(); 
        return  $result;
      }  

      public function GetCompFormulaMpr($id)
      {
        $index=$this->_db->prepare('SELECT idproducto, tipo_producto, porcentaje_formula from formula where idformula=? and tipo_producto="mprima"');
        $index->execute(array($id));
        $result = $index->fetchAll(); 
        return  $result;
      }  

      public function GetDatosCompFormula($idformula, $idproducto)
      {
        $index=$this->_db->prepare('SELECT idformula, idproducto, tipo_producto, porcentaje_formula from formula where idformula=? and idproducto=?');
        $index->execute(array($idformula, $idproducto));
        $result = $index->fetchAll(); 
        return  $result;
      }  

     public function InsertarElemtoFormula($idformula,$idproducto,$tipo_producto)
      {
       $id=null; 
       $valores=array(PDO::PARAM_INT, PDO::PARAM_INT, PDO::PARAM_INT, PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_STR);
       $estado='activar';
       if ($tipo_producto=='empaque') {
         $porcentaje_formula=1;
       }else{
          $porcentaje_formula=0; 
       } 
       $parámetros = array($id, $idformula,$idproducto,$tipo_producto,$porcentaje_formula,$estado);
       $place_holders = implode(',', array_fill(0, count($parámetros), '?'));
       $sql ="INSERT INTO formula (id, idformula, idproducto, tipo_producto, porcentaje_formula, estado) VALUES ($place_holders)";
       $result=Model::Insert($sql,$parámetros,$valores);
      }///

      public function UpdateFormula($idformula,$idproducto,$Porcformula)
      {
      $estado='activado'; 
      $parámetros = array($Porcformula, $estado, $idformula, $idproducto);
      $valores=array(PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_INT, PDO::PARAM_INT);
      $sql ="UPDATE formula SET  porcentaje_formula=? , estado=?  WHERE idformula=? and idproducto=? ";
      $result=Model::Insert($sql,$parámetros,$valores);
      }///

      public function UpdateCompFormula($idformula,$idproducto,$Porcformula)
      {
      $parámetros = array($Porcformula, $idformula, $idproducto);
      $valores=array(PDO::PARAM_STR, PDO::PARAM_STR, PDO::PARAM_INT, PDO::PARAM_INT);
      $sql ="UPDATE formula SET  porcentaje_formula=?  WHERE idformula=? and idproducto=?";
      $result=Model::Insert($sql,$parámetros,$valores);
      }///

      public function GetMPrimasFormula($id)
      { 
          $parametros = array($id);
          $valores=array(PDO::PARAM_INT);
          $sql ="SELECT nombre from productos  where id=? limit 1;";
          $result=Model::query($sql,$parametros,$valores);
          return $result;
        // $index=$this->_db->prepare('SELECT nombre from productos where id=? ');
        // $index->execute(array($id));
        // $result = $index->fetchAll(); 
        // return  $result;
      }///
      public function GetListaCompFormula($idformula)
      {
        $estado='activado';
        $index=$this->_db->prepare('SELECT idformula, idproducto, tipo_producto, porcentaje_formula from formula where idformula=? and estado=? ');
        $index->execute(array($idformula, $estado));
        $result = $index->fetchAll(); 
        return  $result;
      }  

      public function ProductoFormulado($idproducto)
      {
       $Formulacion='formulado'; 
       $parámetros = array($Formulacion,$idproducto);
       $valores=array(PDO::PARAM_STR, PDO::PARAM_INT);
      //$place_holders = implode(',', array_fill(0, count($parámetros), '?'));
      $sql ="UPDATE proterminado SET  formulacion=?  WHERE id=?";
      $result=Model::Insert($sql,$parámetros,$valores);
      }///
#########################################################################################################
# Cierre de Bloques 
#########################################################################################################  
   }
?>