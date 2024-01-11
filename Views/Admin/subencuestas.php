<?php
include("Layouts/header.php");
include("Layouts/sidebar.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Subencuestas</h2>

    <?php
    // Verifica si el array de subencuestas existe y no está vacío
    if (isset($data["subencuestas"]) && (is_array($data["subencuestas"]) || is_object($data["subencuestas"])) && count($data["subencuestas"]) > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Encuesta Principal</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>';

        // Itera sobre el array para imprimir cada fila de la tabla
        foreach ($data["subencuestas"] as $row) {
            echo '<tr>';
            echo '<td>' . $row['id_subencuesta'] . '</td>';
            echo '<td>' . $row['id_encuesta_principal'] . '</td>';
            echo '<td>' . $row['titulo'] . '</td>';
            echo '<td>' . $row['descripcion'] . '</td>';
            echo '<td>
                    <button class="btn btn-primary">Editar</button>
                  </td>';
            echo '</tr>';
        }

        echo '</tbody>
              </table>';
    } else {
        // Si el array está vacío, muestra un mensaje
        echo '<p>Aún no hay datos en esta tabla.</p>';
    }
    ?>

</div>
</main>
</div>
</div>

<?php
include("Layouts/footer.php");
?>
