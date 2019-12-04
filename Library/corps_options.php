<?php
class corp_option
{
    private $nombre = "";
    function __get($prop)
    {
        if (isset($this->$prop)) {
            return $this->$prop;
        } else {
            echo "No existe una propiedad llamda {$prop}";
        }
    }
    function __set($prop, $val)
    {
        if (isset($this->$prop)) {
            $this->$prop = $val;
        } else {
            echo "No existe una propiedad llamda {$prop}";
        }
    }
    function relacionarempresaconhadware($idcorp,$idoption)
    {
        $queryvalidation = "Select * from corps_options where idcorp = '".$idcorp."' and idoptions = '".$idoption."' ";
        $rsqueryvalidation = mysqli_query(Conexion::obj(), $queryvalidation);
        $checkrows=mysqli_num_rows($rsqueryvalidation);
        if($checkrows>0) {
            echo json_encode("false");
         }else{
        $query  = "INSERT INTO corps_options
        (
        idcorp,
        idoptions
        )
        VALUES  ($idcorp,$idoption) ";
        $rs = mysqli_query(Conexion::obj(), $query);
        }
    }
    function modalhadware_de_empresa()
    {
        $datos = array();
        $query  = "SELECT c.Id as codigo,b.id as codigooption,c.nombre 
        as nombreempresa,GROUP_CONCAT(b.nombre) as nombreoption 
FROM corps_options a
inner JOIN options b 
INNER join corps c 
where a.idcorp = c.Id and a.idoptions = b.id  GROUP by a.idcorp ";
        $rs = mysqli_query(Conexion::obj(), $query);
        while ($fila = mysqli_fetch_array($rs)) {
            $datos[] = array(
                'nombreempresa' => $fila['nombreempresa'],
                'nombreoption' => $fila['nombreoption'],
                'codigooption' => $fila['codigooption'],
                'codigo' => $fila['codigo']
            );
         
    }
        $json = json_encode($datos);
        echo $json;
}
    function Listado()
    {
        $datos = array();
        $query  = "SELECT a.id,c.nombre,a.idoptions,a.idcorp , GROUP_CONCAT(b.nombre) as hadwares 
        FROM corps_options a 
        INNER join options b 
        INNER join corps c
         where c.Id = a.idcorp 
         and FIND_IN_SET (b.id,a.idoptions) 
         GROUP by a.idcorp ";
        $rs = mysqli_query(Conexion::obj(), $query);
        while ($fila = mysqli_fetch_array($rs)) {
            $datos[] = array(
                'codigo' => $fila['id'],
                'nombre' => $fila['nombre'],
                'hadwares' => $fila['hadwares'],
                'idcorp' => $fila['idcorp'],
                'idoptions' => $fila['idoptions']
            );

        }
        $json = json_encode($datos);
       echo $json;
    }

  
}