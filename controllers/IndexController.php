<?php
class IndexController
{
    protected $views;
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->views = new View();
    }
 
    
}
?>