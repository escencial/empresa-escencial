<?php 
 class Model
   {
      protected $_db;
    function __construct()
    {
      $this->_db=new Database();
      }

      public  function query($sql,$params=[],$valores=[]){
      $stmt=$this->_db->prepare($sql);
       for ($i=0; $i <count($params) ; $i++) { 
           $num=$i+1; 
             $stmt->bindParam($num , $params[$i], $valores[$i]);
          } 
     $stmt->execute(); 
     // $stmt->execute();
      $result=$stmt->fetch(PDO::FETCH_ASSOC);
      //$result=$statement->fetch();
      return $result;
    }

    public function Insert($sql,$params=[],$valores=[]){
    $stmt =$this->_db->prepare($sql); 
    for ($i=0; $i <count($params) ; $i++) { 
           $num=$i+1; 
             $stmt->bindParam($num , $params[$i], $valores[$i]);
          } 
    //echo $sql; 
     $stmt->execute(); 
    }

    public function select($sql){
      $statement=$this->_db->query($sql);
      return $statement->fetchall();
      // while($rows=$statement->fetch(PDO::FETCH_ASSOC)){
      //    $matrix[]=$rows;
      //  }
      // return  $matrix;
    }
   }     
?>