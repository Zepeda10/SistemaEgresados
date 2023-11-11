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
            echo "enviar";
        }
       
    }

?>