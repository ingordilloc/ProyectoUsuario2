<?php
session_start(); //Solo se utiliza una sola vez ya que el index carga a todos los demas archivos
//Donde los archivos funcionen de forma independiente en el entorno, en cada uno colocaremos un session_start()
//Siempre debe de ir al inicio
$_SESSION['token'] = md5(uniqid(mt_rand(), true));
date_default_timezone_set('America/Guatemala');

require_once('autoload.php');
require_once('Helpers/Helpers.php');
use Controller\PaginaController;

$pagina = new PaginaController;

$pagina->mostrarInicio();





?>