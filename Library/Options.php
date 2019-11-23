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
        $query  = "SELECT * FROM test";
        $rs = mysqli_query(Conexion::obj(), $query);
        while ($fila = mysqli_fetch_array($rs)) {
            $datos[] = array(
                'codigo' => $fila['id'],
                'nombre' => $fila['nombre'],
            );
        
        }
        $json = json_encode($datos);
        echo $json;
    }
}
