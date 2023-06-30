<?php
class MySql {
    private $mysqli;

    public function __construct()
    {
        $config = Config::singleton();
        $dbname = $config->get('dbname');
        $dbpass = $config->get('dbpass');
        $dbhost = $config->get('dbhost');
        $dbuser = $config->get('dbuser');
        //Creamos la conexion
        try {
            $this->mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
            //echo "Connecting to the data base is ssuccefully";
        } catch (\Throwable $th) {
            echo "";
        }
    }
    /*funcion para las consultas y operaciones DLM*/
    public function query($sql){
        return $this->mysqli->query($sql);
    }

}

?>