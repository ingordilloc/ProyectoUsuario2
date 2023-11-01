<?php

namespace Controller;

use Model\CursoModel;

class CursoController
{

    public  function mostrar()
    {
        $curso = CursoModel::mostrarCurso();
        //Aqui se harian los calculos
        return $curso;
    }




}
?>