<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>
 
<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Editar usuario</h2>

    <?php
     echo '<div class="d-flex flex-column">';
     echo '<form method="post" action="'.base_url().'admin/actualizarUsuario" class="form-inline">';
         echo '<div class="form-group mb-2">';
        
         echo '<label for="nombre_completo" class="sr-only mt-2 mb-2">Nombre completo</label>';
         echo '<input type="text" class="form-control mx-auto" id="nombre_completo" name="nombre_completo" value="' . $data["usuario"]["nombre_completo"] . '" style="width: 50%;">';
 
         echo '<label for="usuario" class="sr-only mt-2 mb-2">Usuario</label>';
         echo '<input type="text" class="form-control mx-auto" id="usuario" name="usuario" value="' . $data["usuario"]["usuario"] . '" style="width: 50%;">';
     
         echo '<label for="correo" class="sr-only mt-2 mb-2">Correo</label>';
         echo '<input type="text" class="form-control mx-auto" id="correo" name="correo" value="' . $data["usuario"]["correo"] . '" style="width: 50%;">';
     
         echo '<input type="hidden" name="id_usuario" value="'. $data["usuario"]["id_usuario"] .'">';
         echo '</div>';
         echo '<button type="submit" class="btn btn-primary mx-auto">Actualizar</button>';
     echo '</form>';
     
     echo '</div>';
     

    ?>

</div>
</main>
</div>
</div>

<?php   
    include ("Layouts/footer.php");
?>