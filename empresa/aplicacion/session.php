<?php
 /**
 * 
 */
 class session 
 {
    
    function __construct()
    {
       # code...
    }

    public function init()
    {
       @session_start();
    }

    public function set($varname,$value)
    {
       $_SESSION[$varname]=$value;
    }

    public function destroy()
    {
       session_unset();
       session_destroy();
    }
 }
?>