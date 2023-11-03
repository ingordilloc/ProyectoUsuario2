<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <nav class="navbar bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="https://www.oitcinterfor.org/sites/default/files/img_entidad/logo_intecap_nuevo.jpg" style="height: 100px; width: 100px;">
        </a>
      </div>
    </nav>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        <a class="nav-link" href="index.php?action=nosotros">Nosotros</a>
        <a class="nav-link" href="index.php?action=contacto">Contacto</a>
        <?php
        if (!empty($_SESSION['id']) && (!empty($_SESSION['rol'])))  {
          //Mostrar todas las opciones disponibles
        ?>
          <a class="nav-link" href="index.php?action=inscripcion">Nueva Inscripcion</a>
          <a class="nav-link" href="index.php?action=inscripcioncategoria">Inscripcion por Categoria</a>
          <a class="nav-link" href="index.php?action=mostrar">Ver Inscripciones</a>
          <a class="nav-link" href="index.php?action=logout">Cerrar Sesion</a>
        <?php }  else {  ?><!--Ahorrar lineas de codigo-->
        <a class="nav-link" href="index.php?action=login">Ingresar</a>
        <a class="nav-link" href="index.php?action=crearUsuarioEstudiante">Crear Usuario</a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>