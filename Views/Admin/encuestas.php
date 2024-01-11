<?php
include("Layouts/header.php");
include("Layouts/sidebar.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Encuestas</h2>

    <?php
    // Verifica si el array de encuestas existe y no está vacío
    if (isset($data["encuestas"]) && (is_array($data["encuestas"]) || is_object($data["encuestas"])) && count($data["encuestas"]) > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Fecha de Creación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>';

        // Itera sobre el array para imprimir cada fila de la tabla
        foreach ($data["encuestas"] as $row) {
            echo '<tr>';
            echo '<td>' . $row['id_encuesta'] . '</td>';
            echo '<td>' . $row['titulo_encuesta'] . '</td>';
            echo '<td>' . $row['fecha_creacion'] . '</td>';
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

