<?php   
    include ("Layouts/header.php");
?>

<?php   
    include ("Layouts/sidebar.php");
?>
      <!-- Área de contenido -->
      <div class="content text-center">
      <h2 class="mb-4">Encuestas</h2>
    
      <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Fecha de Creación</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
 

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
