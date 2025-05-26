<?php 

    class Encuesta extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function preguntas($id){
            $data['questions'] = $this->model->getAllQuestions($id);
            $data['close_answers'] = $this->model->getAllCloseAnswers();
            $data['tittle'] = $this->model->getTitle($id);
            $data['id_quiz'] = $id;
            $this->views->getView($this,"encuesta",$data);
        }

        public function enviar($quizId){
            $answers = $_POST["respuesta"] ?? [];
    $answerType = $_POST["tipo_pregunta"] ?? [];

    $i = 0;

    try {
        foreach ($answers as $answerId => $allAnswers) {
            $tipo_pregunta = $answerType[$i] ?? '';
            $i++;

            // Evitar procesar si no hay respuestas
            if (empty($allAnswers)) {
                continue;
            }

            foreach ($allAnswers as $answer) {
                if ($tipo_pregunta == "abierta") {
                    if (trim($answer) !== '') {
                        $this->model->addUsersAnswers($quizId, $answerId, NULL, $answer);
                    }
                } else {
                    if (is_numeric($answer)) {
                        $this->model->addUsersAnswers($quizId, $answerId, (int)$answer, NULL);
                    }
                }
            }
        }

        $nextQuizId = $quizId + 1;

        // Puedes omitir esto si ya estás redireccionando
        echo json_encode(['id_quiz' => $quizId]);

        header("Location: /SistemaEgresados/Encuesta/preguntas/" . $nextQuizId . "?status=success");
        exit();

    } catch (Exception $e) {
        // Mostrar error o redirigir con mensaje de error
        echo "Error al enviar la encuesta: " . $e->getMessage();
        // También puedes hacer log del error si lo necesitas
    }

        }
       
    }

?>