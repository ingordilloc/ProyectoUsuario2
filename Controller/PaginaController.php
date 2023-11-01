<?php

namespace Controller;
use Model\EnlacesModel;

class PaginaController{
    public function mostrarInicio(){
        require_once("View/template.php");
    }

    public function enlacesPagina(){
        if(isset($_GET['action']) ){//Pregunta si esta definida la variable action?
            //Me llevara al modelo
            $enlace= $_GET['action'];
        }else {
            //Me llevara a la pagina de inicio
            $enlace = 'inicio';
        }
    $respuesta = EnlacesModel::enlacesPagina($enlace);
    require_once($respuesta);
   }
     
}

?>