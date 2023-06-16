<?php 

class ClientController{
    private $views;
    public function __construct()
    {
        $this->views = new View();
    }

    public function render(){
        $this->views->show('client/requests.php', []);
    }

}