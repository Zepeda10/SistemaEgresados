<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>
 
<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Agregar usuario</h2>

    <?php
     echo '<div class="d-flex flex-column">';
     echo '<form method="post" action="'.base_url().'admin/guardarUsuario" class="form-inline">';
         echo '<div class="form-group mb-2">';
        
         echo '<label for="nombre_completo" class="sr-only mt-2 mb-2">Nombre completo</label>';
         echo '<input type="text" class="form-control mx-auto" id="nombre_completo" name="nombre_completo" value="" style="width: 50%;">';
 
         echo '<label for="usuario" class="sr-only mt-2 mb-2">Usuario</label>';
         echo '<input type="text" class="form-control mx-auto" id="usuario" name="usuario" value="" style="width: 50%;">';
     
         echo '<label for="correo" class="sr-only mt-2 mb-2">Correo</label>';
         echo '<input type="text" class="form-control mx-auto" id="correo" name="correo" value="" style="width: 50%;">';

         echo '<label for="clave" class="sr-only mt-2 mb-2">Clave</label>';
         echo '<input type="text" class="form-control mx-auto" id="clave" name="clave" value="" style="width: 50%;">';
     
         echo '</div>';
         echo '<div class="d-flex justify-content-between mt-3" style="width: 50%; margin: 0 auto;">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" onclick="window.history.back();" class="btn btn-secondary">Cancelar</button>
                </div>';
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