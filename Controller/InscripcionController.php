<?php

namespace Controller;

use Model\InscripcionModel;

class InscripcionController
{
    public function inscribir()
    {
        if (!empty($_POST['idcurso'])){
            //Si viene declarada y no esta vacia se inscribe
            $datos = array(
                //asignacion de valores recibido a un array
                "idcurso" => $_POST['idcurso'],
                "fecha" => date("y/m/d")
                
            );
            $respuesta = InscripcionModel::guardarInscripcion($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public static function mostrar()
    { 
        $inscripcion = InscripcionModel::mostrarInscripcion();
        //Aqui se harian los calculos
        return $inscripcion;
    
    }
    public static function mostrarOtros()
    { 
          $idrole=$_SESSION['id'];
        $inscripcion = InscripcionModel::mostrarInscripcionOtros($idrole);
        //Aqui se harian los calculos
        return $inscripcion;
    
    }

    public function editar()
    {  //Primer mostrar informacion paso 1
        $idInscripcion = $_GET['idInscripcion'];
        $inscripcion = InscripcionModel::editarInscripcion($idInscripcion);
        return $inscripcion;
    }

    public function actualizar()
    {  //Actulizar informacion paso 2
        if (!empty($_POST['idInscripcion']) && !empty($_POST['idcurso'])) {
            $datos = array(
                "idinscripcion" => $_POST['idInscripcion'],
                "idcurso" => $_POST['idcurso'],
                "idusuario" => $_SESSION['id']
            );
            $respuesta = InscripcionModel::actualizarInscripcion($datos);

            if($respuesta){
                header("Location: index.php?action=mostrar");
            }


        }
    }

    public function borrar(){
        if (!empty($_GET['idInscripcion'])){
            $inscripcion = InscripcionModel::borrarInscripcion($_GET['idInscripcion']);
            return $inscripcion;
        }
    }

    public function confirmarBorrar(){
        if(!empty($_POST['idInscripcion'])){
            $inscripcion = InscripcionModel::borrarConfirmadoInscripcion($_POST['idInscripcion']);
            if($inscripcion){ header("Location: index.php?action=mostrar"); }
        }
    }








}
