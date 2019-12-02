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
           // var_dump($fila);
       
        }
        $json = json_encode($datos);
       echo $json;
    }

  
}