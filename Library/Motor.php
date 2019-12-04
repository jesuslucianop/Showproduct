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
if(isset($_POST['btnguardar'])){
  $r = new corp_option();
 echo $r->relacionarempresaconhadware($_POST['valueofselectempresa'],$_POST['valueofselecthadware']);
  
  }
  
if(isset($_GET['corps_options'])){
  $r = new corp_option();
  echo $r->Listado();
}
if (isset($_GET['corps_optionsmodal'])) {
  $r = new corp_option();
  echo $r->modalhadware_de_empresa();
}
if (isset($_POST['eliminarhadwaredeempresa'])) {
  $r = new corp_option();
  echo $r->eliminarhadwaresde_empresas($_POST['idcorp'],$_POST['idoption']);
}
if (isset($_GET['llenarhadwaredeempresa'])) {
  $r = new corp_option();
  echo $r->llenarhadwaresde_empresas($_GET['idempresa']);
} 
