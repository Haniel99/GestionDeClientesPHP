<?php
require "connection.php";
class TicketModel extends MySql
{
    private $ticketId;
    private $clientId;
    private $equipoId;
    private $descripcion;
    private $tipo;
    private $estado;
    private $fechaApertura;
    private $fechaResolucion;
    public function __construct()
    {
        parent::__construct();
    }
    public function getClientId($email)
    {
        try {
            $sql = "select persona_id from persona where email = '" . $email . "'";
            $res = $this->query($sql);
            foreach ($res as $key => $value) {
                return $value['persona_id'];
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function saveTicket($data)
    {
        //Se definen los atributos del ticket
        $this->descripcion = $data['mensaje'];
        $this->tipo = $data['tipo'];
        $this->estado = 'En progreso';
        $this->fechaApertura =   date('Y-m-d');
        try {
            //Buscar el id del cliente
            $this->clientId = $this->getClientId($data['correo']);
            //Agregar guardar datos del ticket
            $sql = "insert into ticket values (NULL,'" . $this->descripcion . "','" . $this->tipo . "', '" . $this->fechaApertura . "', NULL, '" . $this->tipo . "', null," . $this->clientId . ", NULL )";
            //Query
            $this->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function showTicket()
    {
    }

    public function saveAnswer()
    {
    }
}
