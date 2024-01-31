<?php
include("Layouts/header2.php");
include("Layouts/sidebar2.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Editar subencuesta</h2>

    <?php
echo '<div class="d-flex flex-column">';
echo '<form method="post" action="'.base_url().'admin/actualizarSubencuesta" class="form-inline">';
    echo '<div class="form-group mb-2">';
    echo '<label for="titulo" class="sr-only mt-2 mb-2">Título</label>';
    echo '<input type="text" class="form-control mx-auto" id="titulo" name="titulo" value="' . $data["subencuesta"]["titulo"] . '" style="width: 50%;">';
    echo '<label for="descripcion" class="sr-only mt-2 mb-2">Descripción</label>';
    echo '<input type="text" class="form-control mx-auto" id="descripcion" name="descripcion" value="' . $data["subencuesta"]["descripcion"] . '" style="width: 50%;">';
    echo '<input type="hidden" name="id_subencuesta" value="'. $data["subencuesta"]["id_subencuesta"] .'">';
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
include("Layouts/footer.php");
?>

