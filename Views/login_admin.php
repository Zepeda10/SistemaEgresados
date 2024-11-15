<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seguimiento Egresados | Iniciar Sesión</title>
  <link rel="icon" type="image/jpeg" href="<?php echo images_url(); ?>icono.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo css_url(); ?>login.css">
</head>
<body>

<div class="container">
  <div class="row">
    <!-- Imagen a la izquierda -->
    <div class="col-md-6">
      <img src="<?php echo images_url(); ?>fondo-home.jpg" alt="Imagen de inicio de sesión para administradores" class="login-image">
    </div>

    <!-- Formulario de inicio de sesión a la derecha -->
    <div class="col-md-6">
      <div class="login-container">
        <h2 class="mb-4">Iniciar Sesión</h2>
        
        <!-- Mensaje de error si el usuario no existe -->
        <?php
        if (isset($_GET['error']) && $_GET['error'] === 'usuario_no_existe') {
          echo "
          <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            El usuario no existe. Por favor, intente de nuevo.
            <button type='button' class='close' data-dismiss='alert' aria-label='Cerrar'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
        }
        ?>

        <form id="adminLoginForm" action="../login/iniciarSesionAdmin" method="post">
          <div class="form-group">
            <label for="usuario">Nombre de Usuario</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Ingrese su nombre de usuario">
          </div>
          <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
        </form>

        <hr>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
