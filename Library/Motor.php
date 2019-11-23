<?php 
include "../Library/Config/Conexion.php";
include "../Library/Options.php";
include "../Library/Corps.php";
if(isset($_GET['parametros'])){
  $r = new Options();

  echo $r->Listado();
}