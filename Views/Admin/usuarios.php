<?php   
    include ("Layouts/header.php");
?>

<?php   
    include ("Layouts/sidebar.php");
?>
      <!-- Área de contenido -->
      <div class="content text-center">
      <h2 class="mb-4">Usuarios</h2>

      <div id="tablaContenedor" data-url="<?php echo base_url() . 'admin/buscarUsuariosFiltrados'; ?>"> 
    
      <?php

        echo '<div class="d-flex justify-content-between align-items-center mb-3">';
        echo '<div class="d-flex align-items-center">';
            echo '<a href="' . base_url() . 'admin/agregarUsuario/">';
                echo '<button class="btn btn-success me-2">Agregar</button>';
            echo '</a>';
            echo '<form class="d-flex" id="searchForm">';
                echo '<input type="text" class="form-control" id="filtroUsuario" placeholder="Buscar usuario" />';
            echo '</form>';
        echo '</div>';
        echo '</div>';


      if (isset($data["usuarios"]) && is_array($data["usuarios"]) && count($data["usuarios"]) > 0) {
        // Define el número de registros por página
        $registros_por_pagina = 10;

        // Divide el array en bloques de 10 elementos
        $paginas = array_chunk($data["usuarios"], $registros_por_pagina);

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
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($paginas[$pagina_actual] as $row) {
            echo '<tr>';
            echo '<td>' . $row['id_usuario'] . '</td>';
            echo '<td>' . $row['nombre_completo'] . '</td>';
            echo '<td>' . $row['usuario'] . '</td>';
            echo '<td>' . $row['correo'] . '</td>';
            echo '<td>
                    <a href="'.base_url()."admin/editarUsuario/".$row["id_usuario"].'">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="'.base_url()."admin/eliminarUsuario/".$row["id_usuario"].'">
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
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Correo</th>
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
<script src="<?php echo js_url(); ?>admin/buscarUsuario.js"></script>