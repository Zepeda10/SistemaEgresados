<?php   
    include ("Layouts/header.php");
?>

<?php   
    include ("Layouts/sidebar.php");
?>
      <!-- Área de contenido -->
      <div class="content text-center">
      <h2 class="mb-4">Respuestas Encuestas</h2>
    
      <?php

echo '<div class="d-flex justify-content-between align-items-center mb-3">' .
    '<form class="d-flex col-md-8" id="searchForm">' 
    .
        '<select id="filtroEncuesta" class="form-select me-2" style="width: 120px;">' .
            '<option value="">Encuesta</option>' .
            '<option value="1">Encuesta 1</option>' .
            '<option value="2">Encuesta 2</option>' .
            '<option value="3">Encuesta 3</option>' .
            '<option value="4">Encuesta 4</option>' .
            '<option value="5">Encuesta 5</option>' .
            '<option value="6">Encuesta 6</option>' .
            '<option value="7">Encuesta 7</option>' .
        '</select>' 
        .
        '<input type="text" class="form-control flex-grow-1 me-2" id="filtroUsuario" style="width: 180px;" placeholder="Buscar usuario" />'  .

        '<input type="text" class="form-control flex-grow-1" id="filtroPregunta" style="width: 180px;" placeholder="Buscar pregunta" />' .
    '</form>' .
    '</div>';

       // Verifica si hay datos en el array "respuestas"
    if (isset($data["respuestas"]) && is_array($data["respuestas"]) && count($data["respuestas"]) > 0) {
        // Define el número de registros por página
        $registros_por_pagina = 10;

        // Divide el array en bloques de 10 elementos
        $paginas = array_chunk($data["respuestas"], $registros_por_pagina);

        // Obtiene el número total de páginas
        $total_paginas = count($paginas);

        // Obtiene el número de página actual
        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Muestra solo la página actual
        $pagina_actual = max(min($pagina_actual, $total_paginas), 1);
        $pagina_actual--; // Ajusta el índice del array

        // Contenido de la tabla cuando hay datos
        echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Encuesta</th>
                        <th scope="col">Pregunta</th>
                        <th scope="col">Respuesta Cerrada</th>
                        <th scope="col">Respuesta Abierta</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($paginas[$pagina_actual] as $row) {
            echo '<tr>';
            echo '<td>' . $row['id_respuesta_usuario'] . '</td>';
            echo '<td>' . $row['id_encuesta'] . '</td>';
            echo '<td class="pregunta-columna" data-toggle="tooltip" title="' . htmlspecialchars($row['texto_pregunta']) . '">' . $row['texto_pregunta'] . '</td>';
            echo '<td class="respuesta-columna" data-toggle="tooltip" title="' . htmlspecialchars($row['opcion']) . '">' . $row['opcion'] . '</td>';
            echo '<td class="respuesta-columna" data-toggle="tooltip" title="' . htmlspecialchars($row['texto_respuesta_abierta']) . '">' . $row['texto_respuesta_abierta'] . '</td>';
            echo '<td>' . $row['fecha_respuesta'] . '</td>';
            echo '<td>
                <a href="'.base_url()."admin/eliminarRespuestaEncuesta/".$row["id_respuesta_usuario"].'">
                    <button class="btn btn-danger">Eliminar</button>
                </a>
              </td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Paginador
        echo '<nav aria-label="Page navigation">';
        echo '<ul class="pagination justify-content-center">';

        // Botón de "Anterior"
        $anterior = $pagina_actual - 1;
        echo '<li class="page-item ' . ($pagina_actual == 0 ? 'disabled' : '') . '">';
        echo '<a class="page-link" href="?pagina=' . $anterior . '" tabindex="-1" aria-disabled="true">Anterior</a>';
        echo '</li>';

        // Números de página
        for ($i = 0; $i < $total_paginas; $i++) {
            echo '<li class="page-item ' . ($pagina_actual == $i ? 'active' : '') . '"><a class="page-link" href="?pagina=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
        }

        // Botón de "Siguiente"
        $siguiente = $pagina_actual + 1;
        echo '<li class="page-item ' . ($pagina_actual == $total_paginas - 1 ? 'disabled' : '') . '">';
        echo '<a class="page-link" href="?pagina=' . $siguiente . '">Siguiente</a>';
        echo '</li>';

        echo '</ul>';
        echo '</nav>';
    } else {
        // Contenido de la tabla cuando no hay datos
      echo '<table class="table">
      <thead>
          <tr>
              <th scope="col">ID</th>
              <th scope="col">Encuesta</th>
              <th scope="col">Pregunta</th>
              <th scope="col">Respuesta Cerrada</th>
              <th scope="col">Respuesta Abierta</th>
              <th scope="col">Fecha</th>
              <th scope="col">Acciones</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td colspan="8">Aún no hay datos en esta tabla.</td>
          </tr>
      </tbody>
    </table>';
    }
    ?>

      </div>
    </main>
  </div>
</div>

<?php   
    include ("Layouts/footer.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo js_url(); ?>admin/buscarRespuestaEncuestas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?php echo js_url(); ?>admin/tooltip.js"></script>