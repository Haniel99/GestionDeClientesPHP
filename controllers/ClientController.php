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
    public function sendDatasTickets(){
        $usuario =  $_POST['username'];
        echo $usuario;
    }

    public function reviewRequest() {

    }

    public function selectTicket(){

    }

    public function responseTicket(){

    }



}