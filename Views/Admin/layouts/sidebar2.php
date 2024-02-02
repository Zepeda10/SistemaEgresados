<body>

<div class="container-fluid">
  <div class="row">
    <!-- Barra lateral -->
    <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
      <div class="text-center">
        <img src="../<?php echo images_url(); ?>admin.png" alt="Mini Foto Usuario" class="rounded-circle">
      </div>
      <div class="sidebar-menu">
        <a class="nav-link active" href="<?php echo admin_url(); ?>encuestas">
          Encuestas
        </a>
        <a class="nav-link" href="<?php echo admin_url(); ?>subencuestas">
          Subencuestas
        </a>
        <a class="nav-link" href="<?php echo admin_url(); ?>opcionMultipleEncuesta">
          Opciones múltiples encuestas
        </a>
        <a class="nav-link" href="<?php echo admin_url(); ?>opcionMultipleSubencuesta">
          Opciones múltiples subencuestas
        </a>
        <a class="nav-link" href="<?php echo admin_url(); ?>preguntasEncuestas">
          Preguntas encuestas
        </a>
        <a class="nav-link" href="<?php echo admin_url(); ?>preguntasSubencuestas">
          Preguntas subencuestas
        </a>
        <a class="nav-link active" href="<?php echo admin_url(); ?>respuestasEncuestas">
          Respuestas encuestas
        </a>
        <a class="nav-link" href="<?php echo admin_url(); ?>respuestasSubencuestas">
          Respuestas subencuestas
        </a>
        <a class="nav-link" href="<?php echo admin_url(); ?>usuarios">
          Usuarios
        </a>
      </div>
    </nav>

    <!-- Contenido principal -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Panel de Administración</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../<?php echo images_url(); ?>admin.png" alt="Mini Foto Usuario" class="rounded-circle" width="30" height="30">
              Admin
            </button>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="../<?php echo base_url(); ?>login/logout">Cerrar Sesión</a></li>
            </ul>
          </div>
        </div>
      </div>
    