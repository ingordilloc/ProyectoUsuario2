<?php  //Cerrar sesion
use Controller\UsuarioController;
$usuario= new UsuarioController();
$usuario->logout();

?>