<?php 
include "Config.php";
Class Conexion
{
    static $o_con = null;
  function __construct()
  {
    $this->instancia = Mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
  }
    static function Obj()
    {
        if(self::$o_con==null)
        {
            self::$o_con = new Conexion();
        }
        return self::$o_con->instancia;
    }
    function __destruct()
    {
        mysqli_close($this->instancia);
    }

}


