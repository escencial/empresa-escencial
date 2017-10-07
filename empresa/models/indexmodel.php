<?php
   class indexModel extends Model
   {
      
      public function __construct()
      {
           parent::__construct();
      }

      public function getindex()
      {
         $index=$this->_db->query('select * from clientes');
         return $index->fetchall();
      }
   }
?>
