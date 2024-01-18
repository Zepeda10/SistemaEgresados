<?php 

    class admin extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        /*-------------------------- VER PÁGINAS DEL MENÚ --------------------------*/

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

        public function opcionMultipleEncuesta(){
            $data["opciones"] = $this->model->getAllmultipleChoiceSurveys();
            $this->views->getView($this,"opcion_multiple_encuesta",$data);
        }

        public function opcionMultipleSubencuesta(){
            $data["opciones"] = $this->model->getAllmultipleChoiceSubsurveys();
            $this->views->getView($this,"opcion_multiple_subencuesta",$data);
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
            $data["respuestas"] = $this->model->getAllSurveysResponses();
            $this->views->getView($this,"respuestas_encuestas",$data);
        }

        public function respuestasSubencuestas(){
            $data["respuestas"] = $this->model->getAllSubsurveysResponses();
            $this->views->getView($this,"respuestas_subencuestas",$data);
        }

        public function usuarios(){
            $data["usuarios"] = $this->model->getAllUsers();
            $this->views->getView($this,"usuarios",$data);
        }

        // -------------------------- EDITAR --------------------------

        public function editarEncuesta($id){
            $data["encuesta"] = $this->model->getOneHeaderSurvey($id);
            $this->views->getView($this,"editar_cabecera_encuesta",$data);
        }

        public function actualizarEncuesta(){
            $id = $_POST["id_encuesta"];
            $titulo = $_POST["titulo_encuesta"];
            $this->model->updateHeaderSurvey($titulo,$id);
            header("Location: ".base_url()."admin/encuestas");
        }

        public function editarSubencuesta($id){
            $data["subencuesta"] = $this->model->getOneHeaderSubsurvey($id);
            $this->views->getView($this,"editar_cabecera_subencuesta",$data);
        }

        public function actualizarsubencuesta(){
            $id = $_POST["id_subencuesta"];
            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
            $this->model->updateHeaderSubsurvey($titulo,$descripcion,$id);
            header("Location: ".base_url()."admin/subencuestas");
        }

        
    }

?>