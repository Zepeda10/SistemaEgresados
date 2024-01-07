<?php   
    include ("Layouts/header.php");
?>

<?php   
    include ("Layouts/sidebar.php");
?>

    <!-- Contenido principal -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Encuestas principales</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="<?php echo images_url(); ?>admin.png" alt="Mini Foto Usuario" class="rounded-circle" width="30" height="30">
              Nombre de Usuario
            </button>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li><a class="dropdown-item" href="#">Configuración</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Área de contenido -->
      <div class="content text-center">
        <h2>Bienvenido al Panel de Administración</h2>
        <p>Este es un mensaje de bienvenida centrado.</p>
      </div>
    </main>
  </div>
</div>

<?php   
    include ("Layouts/footer.php");
?>
