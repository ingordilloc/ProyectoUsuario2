<?php
use Controller\InscripcionController;

if(!empty($_SESSION['id']) && ($_SESSION['rol']=='a')) { 
    echo "<h4>Administrador > Listado de Inscripciones</h4>";  //Validacion obligatoria a inicio de sesion
$inscripciones = new InscripcionController;
$listado = $inscripciones->mostrar();

foreach ($listado as $row  =>  $item) {
    
    
    echo "
    <div class='row'>
         <div class='col'>{$item['idinscripcion']}</div>
         <div class='col'>{$item['nombre']}</div>
         <div class='col'>{$item['curso']}</div>
         <div class='col'><a href='index.php?action=editarInscripcion&idInscripcion={$item['idinscripcion']}'>Editar</a></div>
         <div class='col'><a href='index.php?action=eliminarInscripcion&idInscripcion={$item['idinscripcion']}'>Eliminar</a></div>
         
    </div>
    ";
}

} elseif(!empty($_SESSION['id']) || ($_SESSION['rol']=='1') || ($_SESSION['rol']=='2')){
    echo "<h4>Listado de Cursos</h4>";
    $inscripciones = new InscripcionController;
$listado = $inscripciones->mostrarOtros();

foreach ($listado as $row  =>  $item) {
    
    
    echo "
    <div class='row'>
         <div class='col'>{$item['idinscripcion']}</div>
         <div class='col'>{$item['nombre']}</div>
         <div class='col'>{$item['curso']}</div>
         <div class='col'><a href='index.php?action=editarInscripcion&idInscripcion={$item['idinscripcion']}'>Editar</a></div>
         <div class='col'><a href='index.php?action=eliminarInscripcion&idInscripcion={$item['idinscripcion']}'>Eliminar</a></div>
         
    </div>
    ";
}
}

?>