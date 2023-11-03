<?php
use Controller\UsuarioController;
$usuario = new UsuarioController();

?>

<h1>Crear Usuario</h1>

<div class="container">

    <form method="POST">
    <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Ingresar Nombres</label>
                </div>
                <div class="col-10"><input class="form-control" type="text" name="nombres"></div>
            </div>

        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Ingresar Apellidos</label>
                </div>
                <div class="col-10"><input class="form-control" type="text" name="apellidos"></div>
            </div>

        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Crear Usuario</label>
                </div>
                <div class="col-10"><input class="form-control" type="text" name="usuario"></div>
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2"><label>Crear Contraseña</label>
                </div>
                <div class="col-10"><input type="password" name="password" class="form-control"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mt-3">
                <button type="submit" class="btn btn-primary">Registrar Usuario</button>
            </div>
        </div>
        
    </form>
     
<?php 
$resultado=$usuario->crearUsuarioEstudiante();
if($resultado === false){
    echo "<div class='alert alert-success mt-3' role=alert'>
    Error de los datos</div>";
}

?>
</div>