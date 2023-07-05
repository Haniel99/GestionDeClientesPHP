<?php
require "connection.php";
class TicketModel extends MySql
{
    private $ticketId;
    private $clientId;
    private $equipoId;
    private $descripcion;
    private $tipo;
    private $motivo;
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
    public function guardarTicket($data)
    {
        //Se definen los atributos del ticket
        $this->motivo = $data['motivo'];
        $this->descripcion = $data['mensaje'];
        $this->tipo = $data['tipo'];
        $this->estado = 'En progreso';
        $this->fechaApertura =   date('Y-m-d');
        try {
            //Buscar el id del cliente
            $this->clientId = $this->getClientId($data['correo']);
            if(empty($this->clientId)){
                return false;
            }
            //Agregar guardar datos del ticket
            /*$sql = "insert into ticket values (NULL,'" . $this->descripcion . "','" . $this->estado . "', '" . $this->fechaApertura . "', NULL, '" . $this->tipo . "', null," . $this->clientId . ", NULL,' ".$this->motivo."' )";
            //Query
            $this->query($sql);*/
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function obtenerConsultas()
    {   
            try {
                $sql = "select * from ticket where categoria = 'consulta' and estado ='En progreso' ";
                $res = $this->query($sql);
                return $res;
            } catch (\Throwable $th) {
                throw $th;
            }
    }
    public function obtenerReclamo()
    {   
            try {
                $sql = "select * from ticket where categoria = 'reclamo' and estado = 'En progreso'";
                $res = $this->query($sql);
                return $res;
            } catch (\Throwable $th) {
                throw $th;
            }
    }
    public function obtenerDatosTicket($ticketId){
        try {
            //Consulta para obtener los datos del ticket
            $sql = "select t.ticket_id, p.nombre,p.apellido, p.run, p.email, p.telefono, t.motivo, t.descripcion, t.categoria from ticket t join persona p on(t.cliente_id = p.persona_id) where t.ticket_id  = ".$ticketId."";
            //Consulta 
            $res = $this->query($sql);
            return [ "status" => true, "response" => $res];
        } catch (\Throwable $th) {
            return [ "status" => false];
        }
    }
    public function guardarRespuesta($ticketId, $equipoId)
    {
        try {
            //
            $this->equipoId = $equipoId;
            $this->ticketId = $ticketId;
            $this->fechaResolucion = date('Y-m-d');
            //Operacion para actulizar datos del ticket
            $sql = "update ticket
            set estado = 'Resuelto', fecha_resolucion = '".$this->fechaResolucion."', equipo_id = ".$this->equipoId." where ticket_id = ".$this->ticketId."";
            //Consulta
            echo $sql;
            $this->query($sql);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

}
