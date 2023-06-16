<?php
class View
{
    function __construct()
    {
    }
 
    public function show($name, $vars = array())
    {
       //Traemos una instancia de nuestra clase de configuracion.
       $config = Config::singleton();
 
       //Armamos la ruta a la plantilla
       $path = $config->get('viewsFolder') . $name;
       include($path);
    }

}

?>