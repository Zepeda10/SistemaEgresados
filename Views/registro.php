<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seguimiento Egresados | Registro</title>
    <link rel="icon" type="image/jpeg" href="<?php echo images_url(); ?>icono.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo css_url(); ?>registro.css">
</head>
<body>

<div class="container">
  <div class="row">
    <!-- Imagen a la izquierda -->
    <div class="col-md-6">
      <img src="<?php echo images_url(); ?>registro.jpg" alt="Imagen de registro" class="register-image">
    </div>

    <!-- Formulario de registro a la derecha -->
    <div class="col-md-6">
      <div class="register-container">
        <h2 class="mb-4">Registro</h2>
        <form id="registroForm" action="../login/registrarse" method="post">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
          </div>
          <div class="form-group">
            <label for="numero_estudiante">Número de Estudiante</label>
            <input type="text" class="form-control" id="numero_estudiante" name="numero_estudiante" placeholder="Ingrese su número de estudiante">
          </div>
          <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña">
          </div>
          <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo electrónico">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
        </form>
        <hr>
        <p class="text-center">¿Ya tienes una cuenta? <a href="<?php echo base_url(); ?>login/login">Inicia Sesión aquí</a></p>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>