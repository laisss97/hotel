<?php

 ini_set('error_reporting', E_ALL);
 ini_set('display_errors', 1);

require_once 'controller/Controle.php';

$controller = new Controle();

$controller->init();
?>
