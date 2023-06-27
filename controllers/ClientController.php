<?php 

class ClientController{
    private $views;
    private $config;
    public function __construct()
    {
        $this->config = Config::singleton();
        $this->views = new View();
    }

    public function render(){
        $this->views->show('client/requests.php', []);
    }

}