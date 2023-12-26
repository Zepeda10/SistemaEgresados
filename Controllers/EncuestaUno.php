<?php 

    class EncuestaUno extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function preguntas(){
            $data['questions'] = $this->model->getAllQuestions();
            $data['close_answers'] = $this->model->getAllCloseAnswers();
            $this->views->getView($this,"encuesta_uno",$data);
        }

        public function enviar(){
            $answers = $_POST["respuesta"];
            $ids = $_POST["pregunta_id"];
            $quizId = 1;
            $answerIdOpc = 10; // hardcodeado

            echo "enviar...";

            foreach ($answers as $answerId => $allAnswers) {
                foreach ($allAnswers as $answer) {
                    //$this->model->addUsersAnswers($quizId, $answerId, $answerIdOpc, $answer);
                    echo "<br>";
                    echo $quizId . " - " . $answerId . " - " .$answerIdOpc. " - " . $answer ;
                    echo "<br>";
                }
            }

            /*
            if (!empty($answers) && !empty($ids)) {
                foreach ($ids as $key => $id) {
                    $answer = isset($answers[$key]) ? $answers[$key] : null;

                    $this->model->addUsersAnswers($id, $answer);
                }
        
                // header("Location: encuesta_dos.php");
                exit;
            } else {
                echo "Error: Datos insuficientes o mal formateados.";
            }
            */
        }
       
    }

?>