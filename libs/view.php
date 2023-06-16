<?php
class View
{
    function __construct()
    {
        echo "vista";
    }
 
    public function show($name, $vars = array())
    {
        echo "Muestra vista";
    }

}
/*
 El uso es bastante sencillo:
 $vista = new View();
 $vista->show('listado.php', array("nombre" => "Juan"));
*/
?>