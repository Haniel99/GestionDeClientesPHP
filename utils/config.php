<?php
$config = Config::singleton();
 
$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');
$config->set('URL', 'http://localhost/GestionDeClientesPHP/');
 
$config->set('dbhost', 'localhost');
$config->set('dbname', 'gestion_de_reportes');
$config->set('dbuser', 'root');
$config->set('dbpass', '');
?>