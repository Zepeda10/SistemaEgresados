<?php   
    include ("Layouts/header_encuestas.php");
?>

    <link rel="stylesheet" href="<?php echo css_url(); ?>encuesta1.css">

    <!-- Sección de preguntas -->
<form id="encuestaForm" action="../EncuestaUno/enviar" method="post">
<div class="container">
    <h3>
        <?php echo $data['tittle']?>
    </h3>
        
    <div class="preguntas mt-5">  
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
                                <textarea id="pregunta_abierta" name="respuesta[' . $question['id_pregunta'] . '][]" class="form-control"></textarea>
                                <input type="hidden" name="pregunta_id[]" value='.$question['id_pregunta'].'>
                                <input type="hidden" name="tipo_pregunta[]" value="abierta">
                            </li>';

                    }else if($question['tipo_pregunta'] == 'Selección'){
                        $id = $question['id_pregunta'];

                        echo '<li class="list-group-item mb-2" id="pregunta_seleccion_' . $id . '">
                                <p>' . $question['texto_pregunta'] . '</p>
                                <input type="hidden" name="pregunta_id[]" value='.$id.'>
                                <input type="hidden" name="tipo_pregunta[]" value="cerrada">
                                <div class="col-2">';

                        echo '<select class="form-select" name="respuesta[' . $id . '][]">';

                        $filteredData = array_filter($data['close_answers'], function ($element) use ($id) {
                            return filterByAttributeValue($element, $id);
                        });

                        foreach ($filteredData as $element) {
                            echo '<option value="' . $element['id_respuesta'] . '">' . $element['texto_respuesta'] . '</option>';   
                        }

                        echo '</select>
                            </div>
                            </li>';

                    }else if($question['tipo_pregunta'] == 'Radio'){
                        
                        $id = $question['id_pregunta'];

                        echo '<li class="list-group-item mb-2" id="pregunta_radio_' . $id . '">
                                <p>' . $question['texto_pregunta'] . '</p>
                                <input type="hidden" name="pregunta_id[]" value='.$id.'>
                                <input type="hidden" name="tipo_pregunta[]" value="cerrada">
                                ';
                    
                        $filteredData = array_filter($data['close_answers'], function ($element) use ($id) {
                            return filterByAttributeValue($element, $id);
                        });
                    
                        foreach ($filteredData as $element) {
                            echo '<input type="radio" name="respuesta[' . $id . '][]" value="' . $element['id_respuesta'] . '"> ' . $element['texto_respuesta'] . '<br>';
                        }
                    
                        echo '</li>';

                    }else if($question['tipo_pregunta'] == 'Checkbox'){
                        $id = $question['id_pregunta'];

                        echo '<li class="list-group-item mb-2" id="pregunta_checkbox_' . $id . '">
                                <p>' . $question['texto_pregunta'] . '</p>
                                <input type="hidden" name="tipo_pregunta[]" value="cerrada">
                                ';

                        $filteredData = array_filter($data['close_answers'], function ($element) use ($id) {
                            return filterByAttributeValue($element, $id);
                        });

                        foreach ($filteredData as $element) {
                            $checkboxValue = $element['texto_respuesta'];
                            $checkboxId = $element['id_respuesta'];
                    
                            echo '<input type="checkbox" class="checkbox" name="respuesta[' . $id . '][]" value="' . $checkboxId . '"> ' . $checkboxValue . '<br>';
                    
                            // Agrega un campo oculto por cada checkbox seleccionado
                            if (isset($_POST['respuesta']) && in_array($checkboxValue, $_POST['respuesta'])) {
                                echo '<input type="hidden" class="selected-checkboxes" name="pregunta_id[]" value='.$id.'>';     
                            }
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
        <div class="row justify-content-center align-items-center">
            <div class="col-md-3" id="anterior-container">
                <button type="button" class="btn btn-primary" id="anterior">Página Anterior</button>
            </div>
            <div class="col-md-3">
                <span id="actual">1</span>
            </div>
            <div class="col-md-3" id="siguiente-container">
                <button type="button" class="btn btn-primary" id="siguiente">Siguiente Página</button>
            </div>      
            <div class="col-md-3 d-none" id="enviar-container">
                <button type="submit" class="btn btn-success" id="enviar">Enviar</button>
            </div>
        </div>
    </div>

</form>

</body>

<?php   
    include ("Layouts/footer_encuestas.php");
?>