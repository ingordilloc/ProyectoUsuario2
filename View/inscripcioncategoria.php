<?php
use Controller\InscripcionController;
//use Controller\CursoController;
use Controller\CategoriaController;
$categoria= new CategoriaController();
$inscripcion = new InscripcionController();
if(!empty($_SESSION['id']) && !empty($_SESSION['rol']== '1') || !empty($_SESSION['rol']== '2')) {   //Validacion obligatoria a inicio de sesion

?>

<h1>Inscripcion por Categoria</h1>

<div class="container">

    <form method="POST">
       
    <div class="alert alert-light" role="alert">
        <h1><?php echo $_SESSION['nombres'] ."  " .$_SESSION['apellidos'];   ?></h1>
    </div>

       
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Categoria</label>
                </div>
                <div class="col-10">
                <select name="idcategoria">
                        <?php
                        
                        foreach($categoria->mostrar() as $row => $item){
                            {$item['id'];}
                            echo  "<option value='{$item['id']}'>{$item['categoria']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>



        <div class="form-group">
            <div class="row mt-3">
                <button class="btn btn-primary">Siguiente</button>
            </div>
        </div>
        
    </form>
     
<?php 
$inscripcion->inscribir();
echo "
<form method='post'> 

<div class='form-group'>
<div class='row mb-3'>
    <div class='col-2'><label>Curso</label>
    </div>
    <div class='col-10'>
    <select name='idcurso'>
           "; 
            
            foreach($categoria->mostrarCursos() as $row => $item){
                
                echo  "<option value='{$item['id']}'>{$item['curso']}</option>";
            }
            echo " 
            ?>
        </select>
    </div>
</div>
</div>
<button type='submit' class='btn btn-primary'>Inscribir</button>
</form> ";

}//CIERRE DE VALIADACION, INICIO DE SESION 
?>
</div>