<?php
use Controller\InscripcionController;
use Controller\CursoController;
$curso= new CursoController();
$inscripcion = new InscripcionController();
if(!empty($_SESSION['id']) && !empty($_SESSION['rol']== '1') || !empty($_SESSION['rol']== '2') ) {   //Validacion obligatoria a inicio de sesion

?>

<h1>Pagina de Inscripcion</h1>

<div class="container">

    <form method="POST">
       
    <div class="alert alert-light" role="alert">
        <h1><?php echo $_SESSION['nombres'] ."  " .$_SESSION['apellidos'];   ?></h1>
    </div>

       
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Curso</label>
                </div>
                <div class="col-10">
                <select name="idcurso">
                        <?php
                        
                        foreach($curso->mostrar() as $row => $item){
                            {$item['id'];}
                            echo  "<option value='{$item['id']}'>{$item['curso']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>



        <div class="form-group">
            <div class="row mt-3">
                <button class="btn btn-primary">Enviar</button>
            </div>
        </div>
        
    </form>
     
<?php 

$resultado=$inscripcion->inscribir();

if($resultado == "guardado"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    Alumno inscrito</div>";
}
elseif($resultado =="error"){
    echo "<div class='alert alert-success mt-3' role=alert'>
    error</div>";
}
}//CIERRE DE VALIADACION, INICIO DE SESION 
?>
</div>