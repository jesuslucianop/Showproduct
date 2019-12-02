<?php
class Options
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
        
    
        $query1  = "SELECT * from options";
        $rs1 = mysqli_query(Conexion::obj(), $query1);
        while ($fila1 = mysqli_fetch_assoc($rs1)) {
     // $jsonnombre =json_encode($fila['nombre2']);
            $datos[] = array(
                'codigo' => $fila1['id'],
                'nombre' => $fila1['nombre'],
                'detalles' => $fila1['detalle']
                
            );
           // var_dump($fila);
       
        }
        $json = json_encode($datos);
       echo $json;
    }

  
}
