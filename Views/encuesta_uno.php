<?php   
    include ("Layouts/header_encuestas.php");
?>

    <link rel="stylesheet" href="<?php echo css_url(); ?>encuesta1.css">

    <!-- Sección de preguntas -->
    <div class="container preguntas mt-5">
        <h2>Preguntas</h2>
        <!-- Aquí puedes agregar tus preguntas y respuestas en un formato adecuado usando Bootstrap -->
        <div class="container mt-5">
        <h3>Sección 1</h3>
        <ol class="list-group list-group-numbered" id="elementos-preguntas">
            <?php
                // Define la función de callback para el filtro
                function filterByAttributeValue($element, $id) {
                    return $element['id_pregunta'] == $id;
                }
                
                // Recorriendo preguntas cerradas y abiertas
                foreach ($data['questions'] as $pregunta){
                    if($pregunta['tipo_pregunta'] == 'Abierta'){
                        echo '<li class="list-group-item mb-2">
                                <label for="pregunta1">'.$pregunta['texto_pregunta'].'</label>
                                <textarea id="pregunta1" name="respuesta1" class="form-control"></textarea>
                            </li>';

                    }else if($pregunta['tipo_pregunta'] == 'Selección'){
                        $id = $pregunta['id_pregunta'];

                        echo '<li class="list-group-item mb-2">
                                <p>' . $pregunta['texto_pregunta'] . '</p>
                                <div class="col-2">';

                        echo '<select class="form-select" name="pregunta1">';

                        $filteredData = array_filter($data['close_answers'], function ($element) use ($id) {
                            return filterByAttributeValue($element, $id);
                        });

                        foreach ($filteredData as $element) {
                            echo '<option value="' . $element['texto_respuesta'] . '">' . $element['texto_respuesta'] . '</option>';
                        }

                        echo '</select>
                            </div>
                            </li>';

                    }else if($pregunta['tipo_pregunta'] == 'Radio'){
                        
                        $id = $pregunta['id_pregunta'];

                        echo '<li class="list-group-item mb-2">
                                <p>' . $pregunta['texto_pregunta'] . '</p>';
                    
                        $filteredData = array_filter($data['close_answers'], function ($element) use ($id) {
                            return filterByAttributeValue($element, $id);
                        });
                    
                        foreach ($filteredData as $element) {
                            echo '<input type="radio" name="pregunta1" value="' . $element['texto_respuesta'] . '"> ' . $element['texto_respuesta'] . '<br>';
                        }
                    
                        echo '</li>';

                    }else if($pregunta['tipo_pregunta'] == 'Checkbox'){
                        $id = $pregunta['id_pregunta'];

                        echo '<li class="list-group-item mb-2">
                                <p>' . $pregunta['texto_pregunta'] . '</p>';

                        $filteredData = array_filter($data['close_answers'], function ($element) use ($id) {
                            return filterByAttributeValue($element, $id);
                        });

                        foreach ($filteredData as $element) {
                            echo '<input type="checkbox" name="pregunta2[]" value="' . $element['texto_respuesta'] . '"> ' . $element['texto_respuesta'] . '<br>';
                        }

                        echo '</li>';
                    } 
                }

            ?>            
        </ol>
    </div>
    </div>

    <!-- Botones al final -->
    <div class="container mt-3 botones">
    <div class="row paginacion">
        <div class="col-md-6">
            <button class="btn btn-primary" id="anterior">Página Anterior</button>
        </div>
        <div><span id="actual">1</span></div>
        <div class="col-md-6 text-right">
            <button class="btn btn-primary" id="siguiente">Siguiente Página</button>
        </div>
        </div>
    </div>


</body>

<?php   
    include ("Layouts/footer_encuestas.php");
?>