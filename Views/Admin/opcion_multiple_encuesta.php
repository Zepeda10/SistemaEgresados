<?php   
    include ("Layouts/header.php");
?>

<?php   
    include ("Layouts/sidebar.php");
?>
      <!-- Área de contenido -->
      <div class="content text-center">
      <h2 class="mb-4">Opciones Múltiples Encuestas</h2>


      <div id="tablaContenedor" data-url="<?php echo base_url() . 'admin/buscarOpcionesFiltradas'; ?>"> 
      <?php

        echo '<div class="d-flex justify-content-start align-items-center mb-3">';
        echo '<a href="' . base_url() . 'admin/agregarOpcionEncuesta/"><button class="btn btn-success me-2">Agregar</button></a>';
        echo '<form class="d-flex align-items-center" id="searchForm">';
        echo '<input type="text" class="form-control" style="width: 300px;" id="filtroPregunta" placeholder="Buscar pregunta" />';
        echo '</form>';
        echo '</div>';


      if (isset($data["opciones"]) && is_array($data["opciones"]) && count($data["opciones"]) > 0) {
        // Define el número de registros por página
        $registros_por_pagina = 10;

        // Divide el array en bloques de 10 elementos
        $paginas = array_chunk($data["opciones"], $registros_por_pagina);

        // Obtiene el número total de páginas
        $total_paginas = count($paginas);

        // Obtiene el número de página actual
        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Muestra solo la página actual
        $pagina_actual = max(min($pagina_actual, $total_paginas), 1);
        $pagina_actual--; // Ajusta el índice del array

        echo '<table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Opción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($paginas[$pagina_actual] as $row) {
            echo '<tr>';
            echo '<td>' . $row['id_respuesta'] . '</td>';
            echo '<td class="pregunta-columna" data-toggle="tooltip" title="' . htmlspecialchars($row['texto_pregunta']) . '">' . $row['texto_pregunta'] . '</td>';
            echo '<td class="respuesta-columna" data-toggle="tooltip" title="' . htmlspecialchars($row['texto_respuesta']) . '">' . $row['texto_respuesta'] . '</td>';
            echo '<td>
                    <a href="'.base_url()."admin/editarOpcionEncuesta/".$row["id_respuesta"].'">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="'.base_url()."admin/eliminarOpcionEncuesta/".$row["id_respuesta"].'">
                        <button class="btn btn-danger">Eliminar</button>
                    </a>
                  </td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Paginador
        echo '<div style="overflow-x: auto; white-space: nowrap; text-align: center;">';
        echo '<nav aria-label="Page navigation" style="display: inline-block;">';
        echo '<ul class="pagination flex-nowrap">';

        // Botón de "Anterior"
        $anterior = $pagina_actual - 1;
        echo '<li class="page-item ' . ($pagina_actual <= 0 ? 'disabled' : '') . '">';
        echo '<a class="page-link" href="?pagina=' . ($pagina_actual) . '" tabindex="-1" aria-disabled="true">Anterior</a>';
        echo '</li>';

        // Números de página
        for ($i = 0; $i < $total_paginas; $i++) {
            echo '<li class="page-item ' . ($pagina_actual == $i ? 'active' : '') . '"><a class="page-link" href="?pagina=' . ($i + 1) . '">' . ($i + 1) . '</a></li>';
        }

        // Botón de "Siguiente"
        $siguiente = $pagina_actual + 1;
        echo '<li class="page-item ' . ($pagina_actual >= $total_paginas - 1 ? 'disabled' : '') . '">';
        echo '<a class="page-link" href="?pagina=' . ($pagina_actual + 2) . '">Siguiente</a>';
        echo '</li>';
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
      } else {
        // Contenido de la tabla cuando no hay datos
      echo '<table class="table">
      <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Opción</th>
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

      </div>
    </main>
  </div>
</div>

<?php   
    include ("Layouts/footer.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo js_url(); ?>admin/buscarOpcionesEncuestas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?php echo js_url(); ?>admin/tooltip.js"></script>