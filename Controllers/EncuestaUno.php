<?php 

    class EncuestaUno extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function preguntas(){
            $data['questions'] = $this->model->getAllQuestions();
            $data['close_answers'] = $this->model->getAllCloseAnswers();
            $data['tittle'] = $this->model->getTitle(1);
            $this->views->getView($this,"encuesta_uno",$data);
        }

        public function enviar(){
            $answers = $_POST["respuesta"];
            $ids = $_POST["pregunta_id"];
            $quizId = 1;
            $answerType = $_POST["tipo_pregunta"];
            $userId = 1; // hardcodeado
            $i = 0;

            echo "enviar...";

            foreach ($answers as $answerId => $allAnswers){
                $tipo_pregunta = $answerType[$i];
                $i = $i + 1;
                    
                foreach ($allAnswers as $answer) {

                    if($tipo_pregunta == "abierta"){
                         $this->model->addUsersAnswers($userId, $quizId, $answerId, NULL, $answer);
                        // echo "<br>" . $quizId . " - " . $answerId . " - " . $answer . " - abierta <br>";
                    }else{
                         $this->model->addUsersAnswers($userId, $quizId, $answerId, $answer, NULL);
                        // echo "<br>" . $quizId . " - " . $answerId . " - " . $answer . " - cerrada <br>";
                    }
                    
                }
            }

        }
       
    }

?>