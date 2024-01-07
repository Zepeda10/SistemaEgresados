<?php 

    class admin extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function inicio(){
            $this->views->getView($this,"inicio");
        }

        public function encuestas(){
            $data["encuestas"] = $this->model->getAllHeaderSurveys();
            $this->views->getView($this,"encuestas",$data);
        }

        public function subencuestas(){
            $data["subencuestas"] = $this->model->getAllHeaderSubsurveys();
            $this->views->getView($this,"subencuestas",$data);
        }

        public function preguntasEncuestas(){
            $data["preguntas"] = $this->model->getAllSurveys();
            $this->views->getView($this,"preguntas_encuestas",$data);
        }

        public function preguntasSubencuestas(){
            $data["preguntas"] = $this->model->getAllSubsurveys();
            $this->views->getView($this,"preguntas_subencuestas",$data);
        }

        public function respuestasEncuestas(){
            $data["respuestas"] = $this->model->getAllSubsurveys();
            $this->views->getView($this,"respuestas_encuestas",$data);
        }

        public function respuestasSubencuestas(){
            $data["respuestas"] = $this->model->getAllSubsurveys();
            $this->views->getView($this,"respuestas_subencuestas",$data);
        }

        public function usuarios(){
            $data["usuarios"] = $this->model->getAllUsers();
            $this->views->getView($this,"usuarios",$data);
        }
        
    }

?>