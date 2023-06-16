<?php
class MySql {
    private $conexion;

    public function __construct()
    {
        $config = Config::singleton();
        $dbname = $config->get('dbname');
        $dbpass = $config->get('dbpass');
        $dbhost = $config->get('dbhost');
        $dbuser = $config->get('dbuser');
        //Creamos la conexion
        try {
            $this->conexion = new mysqli($dbhost, $dbuser, $dbpass, $dbname);      
        } catch (\Throwable $th) {
            echo "Error connecting to the database";
        }
    }
    /*funcion para las consultas y operaciones DLM*/
    public function query($sql){
        return $this->conexion->query($sql);
    }

}

?>