<nav class="navbar navbar-expand-lg scrorev-nav-control menu" style="background-color: #1b396a;">
  <div class="container-fluid text-center">

    <a href="home"><img class="" src="img/itma2.png" width="50px"></a><a class="btn navbar-brand m" href="home" style="color: #FFF;">ITMA II</a>

    <!-- Boton de hamburgesa al cambiar el tamaño de pantalla -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars text-white"></i>
    </button>

    <!-- Opciones de barra de navegacion -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">    
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="btn btn-blue" href="home"><img class="mx-auto" src="img/ico_home.png" width="25px" height="25px" title="Inicio"> Inicio</a>
        </li>
      </ul>
      <ul class="navbar-nav">
      <?php if (!empty($_SESSION['user']['email'])):?>
        <li class="nav-item dropdown">
          <a class="btn btn-blue dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user ml-1"></i> <?=$_SESSION['user']['email'] ?></a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
            <button type="button" class="dropdown-item btn btn-dark" id="cerrarSesion"><i class="fas fa-power-off mr-2"></i>Cerrar Sesion</button>
          </div>
      <?php else: ?>
        <li class="nav-item">
          <a class="btn btn-blue" href="login">Iniciar Sesion <i class="fas fa-user ml-1"></i></a>
      <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>