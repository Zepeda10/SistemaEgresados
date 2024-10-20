<?php 

    class EncuestaUno extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function preguntas($id){
            $data['questions'] = $this->model->getAllQuestions($id);
            $data['close_answers'] = $this->model->getAllCloseAnswers();
            $data['tittle'] = $this->model->getTitle($id);
            $data['id_quiz'] = $id;
            $this->views->getView($this,"encuesta_uno",$data);
        }

        public function enviar(){
            $answers = $_POST["respuesta"];
            $ids = $_POST["pregunta_id"];
            $quizId = isset($_GET['id']) ? (int)$_GET['id'] : 1;
            $answerType = $_POST["tipo_pregunta"];
            $userId = 1; // hardcodeado
            $i = 0;

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

            $nextQuizId = $quizId + 1;

            header("Location: /SistemaEgresados/EncuestaUno/preguntas/" . $nextQuizId);
            exit(); 

        }
       
    }

?>