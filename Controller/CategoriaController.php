<?php

namespace Controller;

use Model\CategoriaModel;

class CategoriaController
{
    

    public static function mostrar()
    {
        $inscripcion = CategoriaModel::mostrarCategoria();
        //Aqui se harian los calculos
        return $inscripcion;
    }

    public function mostrarCursos(){
        if (!empty($_POST['idcategoria'])){
            $cursos = CategoriaModel::mostrarCursosCategoria($_POST['idcategoria']);
            return $cursos;
        }
    }



}
?>