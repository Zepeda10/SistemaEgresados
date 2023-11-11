<?php   
    include ("Layouts/header_encuestas.php");
?>

    <link rel="stylesheet" href="<?php echo css_url(); ?>encuesta1.css">

    <!-- Sección de preguntas -->
<form id="encuestaForm" action="../EncuestaUno/enviar" method="post">
    <div class="container preguntas mt-5">
        <h2>Preguntas</h2>
        <div class="container mt-5">
        <h3>Sección 1</h3>
        <ol class="list-group list-group-numbered" id="elementos-preguntas">
            <?php
                // Define la función de callback para el filtro
                function filterByAttributeValue($element, $id) {
                    return $element['id_pregunta'] == $id;
                }
                
                // Recorriendo preguntas cerradas y abiertas
                foreach ($data['questions'] as $question){
                    if($question['tipo_pregunta'] == 'Abierta'){
                        echo '<li class="list-group-item mb-2">
                                <label for="pregunta_abierta">'.$question['texto_pregunta'].'</label>
                                <textarea id="pregunta_abierta" name="respuesta_abierta" class="form-control"></textarea>
                            </li>';

                    }else if($question['tipo_pregunta'] == 'Selección'){
                        $id = $question['id_pregunta'];

                        echo '<li class="list-group-item mb-2">
                                <p>' . $question['texto_pregunta'] . '</p>
                                <div class="col-2">';

                        echo '<select class="form-select" name="pregunta_seleccion">';

                        $filteredData = array_filter($data['close_answers'], function ($element) use ($id) {
                            return filterByAttributeValue($element, $id);
                        });

                        foreach ($filteredData as $element) {
                            echo '<option value="' . $element['texto_respuesta'] . '">' . $element['texto_respuesta'] . '</option>';
                        }

                        echo '</select>
                            </div>
                            </li>';

                    }else if($question['tipo_pregunta'] == 'Radio'){
                        
                        $id = $question['id_pregunta'];

                        echo '<li class="list-group-item mb-2">
                                <p>' . $question['texto_pregunta'] . '</p>';
                    
                        $filteredData = array_filter($data['close_answers'], function ($element) use ($id) {
                            return filterByAttributeValue($element, $id);
                        });
                    
                        foreach ($filteredData as $element) {
                            echo '<input type="radio" name="pregunta_radio" value="' . $element['texto_respuesta'] . '"> ' . $element['texto_respuesta'] . '<br>';
                        }
                    
                        echo '</li>';

                    }else if($question['tipo_pregunta'] == 'Checkbox'){
                        $id = $question['id_pregunta'];

                        echo '<li class="list-group-item mb-2">
                                <p>' . $question['texto_pregunta'] . '</p>';

                        $filteredData = array_filter($data['close_answers'], function ($element) use ($id) {
                            return filterByAttributeValue($element, $id);
                        });

                        foreach ($filteredData as $element) {
                            echo '<input type="checkbox" name="pregunta_checkbox[]" value="' . $element['texto_respuesta'] . '"> ' . $element['texto_respuesta'] . '<br>';
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
        <div class="row paginacion justify-content-between">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" id="anterior">Página Anterior</button>
            </div>
            <div class="col-md-3 text-center">
                <span id="actual">1</span> <!-- Puedes actualizar el número de página aquí -->
            </div>
            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-primary" id="siguiente">Siguiente Página</button>
            </div>
            <div class="col-md-3 text-end">
                <button type="submit" class="btn btn-success" id="enviar">Enviar</button>
            </div>
        </div>
    </div>
</form>

</body>

<?php   
    include ("Layouts/footer_encuestas.php");
?>