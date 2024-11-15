<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Si no hay sesión iniciada, redirige al login
    header("Location: " . base_url() . "login/admin");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración</title>
  <link rel="icon" type="image/jpeg" href="<?php echo images_url(); ?>icono.jpg">
  <link rel="stylesheet" href="<?php echo css_url(); ?>boostrap-css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo css_url(); ?>admin/header.css">
  <link rel="stylesheet" href="<?php echo css_url(); ?>admin/sidebar.css">
</head>
