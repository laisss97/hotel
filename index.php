<?php

 ini_set('error_reporting', E_ALL);
 ini_set('display_errors', 1);

require_once 'controller/Controle.php';

session_start();
$_SESSION['nQuartoSimple'] = 3;
$_SESSION['nQuartoLux'] = 3;
$_SESSION['nQuartoLuxMaster'] = 3;
$_SESSION['nQuartoLuxImperial'] = 3;

$controller = new Controle();

$controller->init();
?>
