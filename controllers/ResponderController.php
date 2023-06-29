<?php 

class ResponderController{
    private $views;
    private $config;
    public function __construct()
    {
        $this->config = Config::singleton();
        $this->views = new View();
    }

    public function render(){
        require "./models/AdminModel.php";
        $model = new AdminModel();
        $this->views->show('admin/verConsultas.php', []);
    }

}