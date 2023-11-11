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
            $respuestasAbiertas = $_POST["pregunta_abierta"];
            $idsAbiertas = $_POST["pregunta_abierta_id"];
            $respuestasSeleccion = $_POST["pregunta_seleccion"];
            $idsSeleccion = $_POST["pregunta_seleccion_id"];
            $respuestasRadio = $_POST["pregunta_radio"];
            $idsRadio = $_POST["pregunta_radio_id"];
            $respuestasCheckbox = isset($_POST["pregunta_checkbox"]) ? $_POST["pregunta_checkbox"] : [];
            $idsCheckbox = $_POST["pregunta_checkbox_id"];
            
            // Pasar datos a modelo...
            // $this->model->addCloseAnswers();
            // $this->model->addOpenAnswers();

            // header("Location: encuesta_dos.php");
            exit;
        }
       
    }

?>