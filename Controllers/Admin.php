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

        public function editarOpcionEncuesta($id){
            $data["opcion"] = $this->model->getOneChoiceSurveys($id);
            $this->views->getView($this,"editar_opcion_multiple_encuesta",$data);
        }

        public function actualizarOpcionEncuesta(){
            $id = $_POST["id_respuesta"];
            $idPregunta = $_POST["id_pregunta"];
            $opcion = $_POST["texto_respuesta"];
            $valor = $_POST["valor_numerico"];
            $this->model->updateChoiceSurveys($id,$idPregunta,$opcion,$valor);
            header("Location: ".base_url()."admin/opcionMultipleEncuesta");
        }

        public function editarOpcionSubencuesta($id){
            $data["opcion"] = $this->model->getOneChoiceSubsurveys($id);
            $this->views->getView($this,"editar_opcion_multiple_subencuesta",$data);
        }

        public function actualizarOpcionSubencuesta(){
            $id = $_POST["id_respuesta"];
            $idPregunta = $_POST["id_pregunta_subencuesta"];
            $opcion = $_POST["texto_respuesta"];
            $valor = $_POST["valor_numerico"];
            $this->model->updateChoiceSubsurveys($id,$idPregunta,$opcion,$valor);
            header("Location: ".base_url()."admin/opcionMultipleSubencuesta");
        }

        public function editarPreguntaEncuesta($id){
            $data["pregunta"] = $this->model->getOneQuestionSurvey($id);
            $this->views->getView($this,"editar_pregunta_encuesta",$data);
        }

        public function actualizarPreguntaEncuesta(){
            $id = $_POST["id_pregunta"];
            $idEncuesta = $_POST["id_encuesta"];
            $tipo = $_POST["tipo_pregunta"];
            $pregunta = $_POST["texto_pregunta"];
            $this->model->updateQuestionSurvey($id,$idEncuesta,$tipo,$pregunta);
            header("Location: ".base_url()."admin/preguntasEncuestas");
        }

        public function editarPreguntaSubencuesta($id){
            $data["pregunta"] = $this->model->getOneQuestionSubsurvey($id);
            $this->views->getView($this,"editar_pregunta_subencuesta",$data);
        }

        public function actualizarPreguntaSubencuesta(){
            $id = $_POST["id_pregunta_subencuesta"];
            $idSubencuesta = $_POST["id_subencuesta"];
            $tipo = $_POST["tipo_pregunta"];
            $pregunta = $_POST["texto_pregunta"];
            $this->model->updateQuestionSubsurvey($id,$idSubencuesta,$tipo,$pregunta);
            header("Location: ".base_url()."admin/preguntasSubencuestas");
        }

        public function editarUsuario($id){
            $data["usuario"] = $this->model->getOneUser($id);
            $this->views->getView($this,"editar_usuario",$data);
        }

        public function actualizarUsuario(){
            $id = $_POST["id_usuario"];
            $nombre = $_POST["nombre"];
            $numero = $_POST["numero_estudiante"];
            $correo = $_POST["correo"];
            $tipo = $_POST["tipo"];
            $this->model->updateUser($id,$nombre,$numero,$correo,$tipo);
            header("Location: ".base_url()."admin/usuarios");
        }

        
    }

?>