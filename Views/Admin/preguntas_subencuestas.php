<?php   
    include ("Layouts/header.php");
?>

<?php   
    include ("Layouts/sidebar.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
      <h2 class="mb-4">Preguntas Subencuestas</h2>

<?php

    echo '<div class="d-flex justify-content-between align-items-center mb-3">' .
    '<a href="' . base_url() . 'admin/agregarPreguntaEncuesta/"><button class="btn btn-success float-start mb-3">Agregar</button></a>' .

    '<form class="d-flex col-md-8" id="searchForm">' 
    .
        '<select id="filtroEncuesta" class="form-select me-2" style="width: 120px;">' .
            '<option value="">Encuesta</option>' .
            '<option value="1">Subencuesta 1</option>' .
            '<option value="2">Subencuesta 2</option>' .
            '<option value="3">Subencuesta 3</option>' .
        '</select>' 
        .
        '<select id="filtroTipo" class="form-select me-2" style="width: 120px;">' .
            '<option value="">Tipo</option>' .
            '<option value="Abierta">Abierta</option>' .
            '<option value="Selección">Selección</option>' .
            '<option value="Radio">Radio</option>' .
            '<option value="Checkbox">Checkbox</option>' .
        '</select>' .

        '<input type="text" class="form-control flex-grow-1" id="filtroPregunta" style="width: 180px;" placeholder="Buscar pregunta" />' .
    '</form>' .
    '</div>';

if (isset($data["preguntas"]) && is_array($data["preguntas"]) && count($data["preguntas"]) > 0) {
        // Define el número de registros por página
        $registros_por_pagina = 10;

        // Divide el array en bloques de 10 elementos
        $paginas = array_chunk($data["preguntas"], $registros_por_pagina);

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
                    <th scope="col">Subencuesta</th>
                    <th scope="col">Tipo de pregunta</th>
                    <th scope="col">Pregunta</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($paginas[$pagina_actual] as $row) {
            echo '<tr>';
            echo '<td>' . $row['id_pregunta_subencuesta'] . '</td>';
            echo '<td>' . $row['id_subencuesta'] . '</td>';
            echo '<td>' . $row['tipo_pregunta'] . '</td>';
            echo '<td>' . $row['texto_pregunta'] . '</td>';
            echo '<td>
                    <a href="'.base_url()."admin/editarPreguntaSubencuesta/".$row["id_pregunta_subencuesta"].'">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="'.base_url()."admin/eliminarPreguntaSubencuesta/".$row["id_pregunta_subencuesta"].'">
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
                    <th scope="col">Subencuesta</th>
                    <th scope="col">Tipo de pregunta</th>
                    <th scope="col">Pregunta</th>
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

<?php   
    include ("Layouts/footer.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo js_url(); ?>admin/buscarPreguntaEncuestas.js"></script>