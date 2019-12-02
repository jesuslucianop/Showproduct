<?php 
include "../Library/Config/Conexion.php";
include "../Library/Options.php";
include "../Library/Corps.php";
include "../Library/corps_options.php";
if(isset($_GET['prodcuto'])){
  $r = new Options();

  echo $r->Listado();
}
if(isset($_GET['empresas'])){
  $r = new Corps();

  echo $r->Listado();
}

if(isset($_GET['corps_options'])){
  $r = new corp_option();
  echo $r->Listado();
}
