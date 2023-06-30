<?php
class View
{
    private $config;
    private $data;
    function __construct()
    {
    }
 
    public function show($name, $vars = array())
    {
        $array1 = array();
        foreach ($vars as $key => $value) {
            array_push($array1, $value);
        }
        $this->data = $array1;
       //Traemos una instancia de nuestra clase de configuracion.
       $this->config = Config::singleton();
 
       //Armamos la ruta a la plantilla
       $path = $this->config->get('viewsFolder') . $name;
       include($path);
    }

}
