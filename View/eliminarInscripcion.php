<?php
use Controller\InscripcionController;

$inscripcion = new InscripcionController();
$registro = $inscripcion->borrar();
$inscripcion->confirmarBorrar();

?>

<form method="post">
<?php echo $_SESSION['nombres']. " ". $_SESSION['apellidos'];?>
<br>
<?php echo $registro['curso'];?>
<p>¿Seguro que desea anular inscripcion?</p>
<input type="hidden" name="idInscripcion" value ="<?php echo $registro['idinscripcion'];?>">
<button type="submit" class="btn btn-primary">Borrar</button>


</form>