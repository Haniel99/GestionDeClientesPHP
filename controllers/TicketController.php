
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
            header("Location: " . $this->config->get('URL') . "client");
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
            header("Location: " . $this->config->get('URL') . "client");
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
            header("Location:" . $this->config->get('URL') . "client?alert=&sad3A");
        }else{
            header("Location:" . $this->config->get('URL') . "client?alert=$31dd3");
        }
    }

    public function reviewQueries()
    {
        $model = new TicketModel();
        $res = $model->getQueries();
        $this->views->show('admin/consultas.php', $res);
    }
    public function reviewClaims()
    {
        $model = new TicketModel();
        $res = $model->getClaims();
        $this->views->show('admin/reclamos.php', $res);
    }


    public function selectTicket()
    {
    }

    public function responseTicket()
    {
    }
}

?>