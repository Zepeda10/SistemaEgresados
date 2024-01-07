<?php   
    include ("Layouts/header.php");
?>

<?php   
    include ("Layouts/sidebar.php");
?>
      <!-- Área de contenido -->
      <div class="content text-center">
      <h2 class="mb-4">Subencuestas</h2>
    
      <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Encuesta Principal</th>
                <th scope="col">Título</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
 

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
            ?>
        </tbody>
    </table>

      </div>
    </main>
  </div>
</div>

<?php   
    include ("Layouts/footer.php");
?>