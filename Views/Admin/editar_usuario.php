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
        
         echo '<label for="nombre" class="sr-only mt-2 mb-2">Nombre completo</label>';
         echo '<input type="text" class="form-control mx-auto" id="nombre" name="nombre" value="' . $data["usuario"]["nombre"] . '" style="width: 50%;">';
 
         echo '<label for="numero_estudiante" class="sr-only mt-2 mb-2">No. estudiante</label>';
         echo '<input type="text" class="form-control mx-auto" id="numero_estudiante" name="numero_estudiante" value="' . $data["usuario"]["numero_estudiante"] . '" style="width: 50%;">';
     
         echo '<label for="correo" class="sr-only mt-2 mb-2">Correo</label>';
         echo '<input type="text" class="form-control mx-auto" id="correo" name="correo" value="' . $data["usuario"]["correo"] . '" style="width: 50%;">';
     
         echo '<label for="tipo" class="sr-only mt-2 mb-2">Tipo</label>';
         echo '<input type="text" class="form-control mx-auto" id="tipo" name="tipo" value="' . $data["usuario"]["tipo"] . '" style="width: 50%;">';
     
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