
<?php

require "models/TicketModel.php";
class TicketController
{
    private $views;
    private $config;
    public function __construct()
    {
        $this->config = Config::singleton();
        $this->views = new View();
    }

    public function render()
    {
        $this->views->show('verConsultas.php', []);
    }
    public function ingresarTicket(){
        $this->views->show('requests.php', []);   
    }
    public function enviarDatosTicket()
    {
        if (
            !isset($_GET['type']) ||
            !isset($_POST['motivo']) ||
            !isset($_POST['nombre']) ||
            !isset($_POST['telefono']) ||
            !isset($_POST['rut']) ||
            !isset($_POST['correo']) ||
            !isset($_POST['message']) ||
            empty($_POST['motivo']) ||
            empty($_POST['nombre']) ||
            empty($_POST['telefono']) ||
            empty($_POST['rut']) ||
            empty($_POST['correo']) ||
            empty($_POST['message'])
        ) {
            header("Location: " . $this->config->get('URL') . "ticket/ingresarTicket?msg=true");
            exit(); // Terminar la ejecución del script después de redirigir
        }

        $motivo = $_POST['motivo'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $rut = $_POST['rut'];
        $correo = $_POST['correo'];
        $mensaje = $_POST['message'];
        $tipo = $_GET['type'];
        // Verificar si algún campo está vacío después de realizar la asignación
        if (empty($motivo) || empty($nombre) || empty($telefono) || empty($rut) || empty($correo) || empty($mensaje)) {
            header("Location: " . $this->config->get('URL') . "ticket/ingresarTicket?msg=true");
            exit();
        }

        // Crea el arreglo
        $data = [
            'motivo' => $motivo,
            'nombre' => $nombre,
            'telefono' => $telefono,
            'rut' => $rut,
            'correo' => $correo,
            'mensaje' => $mensaje,
            'tipo' => $tipo
        ];


        //Instancia del modelo
        $model = new TicketModel();
        $res = $model->guardarTicket($data);
        if ($res) {
            header("Location:" . $this->config->get('URL') . "ticket/ingresarTicket?alert=1");
        } else {
            header("Location:" . $this->config->get('URL') . "ticket/ingresarTicket?alert=err");
        }
    }

    public function revisarConsultas()
    {
        $model = new TicketModel();
        $res = $model->obtenerConsultas();
        $this->views->show('consultas.php', $res);
    }
    public function revisarReclamos()
    {
        $model = new TicketModel();
        $res = $model->obtenerReclamo();
        $this->views->show('reclamos.php', $res);
    }


    public function seleccionarTicket()
    {
        //Verifica si existe el id del ticket
        if (!isset($_GET['ticket_id']) || empty($_GET['ticket_id'])) {
            echo "it don't exists";
        } else {
            //Obtener id del ticket
            $ticketId = $_GET['ticket_id'];
            $model = new TicketModel();
            $res = $model->obtenerDatosTicket($ticketId);
            if($res['status']){
                $this->views->show('respuestas.php', $res['response']);
            }else{
                echo 'error en la base de datos';
            }  
        }
    }

    public function responderTicket()
    {
        //Verifica si existe id
        if(!isset($_GET['ticketId']) || !isset($_GET['equipoId']) || empty($_GET['equipoId']) || empty($_GET['ticketId'])){
            echo 'No existe identificadores';
        }else{
            //Obtiene identificares
            $ticketId = $_GET['ticketId'];
            $equipoId = $_GET['equipoId'];
            $tipo = $_GET['tipo'];
            //Instancia de la clase modelo
            $model = new TicketModel();
            //Llama metodo para guardar respuesta
            $res = $model->guardarRespuesta($ticketId, $equipoId);
            if($res){
                if($tipo == 'consulta'){
                    header("Location: " . $this->config->get('URL') . "ticket/revisarConsultas?msg=true");
                }else{
                    header("Location: " . $this->config->get('URL') . "ticket/revisarReclamos?msg=true");
                }
            }else{
                echo 'Error al guardar el dato';
            }
        }

    }

}

?>