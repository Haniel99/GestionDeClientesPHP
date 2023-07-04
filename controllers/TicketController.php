
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
        $this->views->show('requests.php', []);
    }
    public function sendDatasTickets()
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
            header("Location: " . $this->config->get('URL') . "ticket?msg=true");
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
            header("Location: " . $this->config->get('URL') . "ticket?msg=true");
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
        $res = $model->saveTicket($data);
        if ($res) {
            header("Location:" . $this->config->get('URL') . "ticket?alert=1");
        } else {
            header("Location:" . $this->config->get('URL') . "ticket?alert=err");
        }
    }

    public function reviewQueries()
    {
        $model = new TicketModel();
        $res = $model->getQueries();
        $this->views->show('consultas.php', $res);
    }
    public function reviewClaims()
    {
        $model = new TicketModel();
        $res = $model->getClaims();
        $this->views->show('reclamos.php', $res);
    }


    public function selectTicket()
    {
        //Verifica si existe el id del ticket
        if (!isset($_GET['ticket_id']) || empty($_GET['ticket_id'])) {
            echo "it don't exists";
        } else {
            //Obtener id del ticket
            $ticketId = $_GET['ticket_id'];
            $model = new TicketModel();
            $res = $model->getTicketData($ticketId);
            if($res['status']){
                $this->views->show('respuestas.php', $res['response']);
            }else{
                echo 'error en la base de datos';
            }  
        }
    }

    public function answerTicket()
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
            $res = $model->saveAnswer($ticketId, $equipoId);
            if($res){
                if($tipo == 'consulta'){
                    header("Location: " . $this->config->get('URL') . "ticket/reviewQueries?msg=true");
                }else{
                    header("Location: " . $this->config->get('URL') . "ticket/reviewClaims?msg=true");
                }
            }else{
                echo 'Error al guardar el dato';
            }
        }

    }

}

?>