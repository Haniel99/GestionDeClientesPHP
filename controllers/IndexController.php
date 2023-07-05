<?php
class IndexController
{
    protected $views;
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->views = new View();
    }

    public function render(){
        $this->views->show('index.php', []);
    }  

}
?>