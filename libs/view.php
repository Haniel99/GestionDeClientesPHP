<?php
class View
{
    private $config;
    function __construct()
    {
    }
 
    public function show($name, $vars = array())
    {
       //Traemos una instancia de nuestra clase de configuracion.
       $this->config = Config::singleton();
 
       //Armamos la ruta a la plantilla
       $path = $this->config->get('viewsFolder') . $name;
       include($path);
    }

}

?>