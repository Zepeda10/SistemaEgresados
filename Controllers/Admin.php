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
            $data['preguntas'] = $this->model->getQuestionsBySurvey(1);
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
            $data['preguntas'] = $this->model->getQuestionsBySubsurvey(1);
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

        // -------------------------- AGREGAR --------------------------
        public function agregarOpcionEncuesta(){
            $data['preguntas'] = $this->model->getQuestionsBySurvey(1);
           $this->views->getView($this,"agregar_opcion_multiple_encuesta",$data);
        }

        public function guardarOpcionEncuesta(){
            $idPregunta = $_POST["id_pregunta"];
            $opcion = $_POST["texto_respuesta"];
            $valor = $_POST["valor_numerico"];
            $this->model->addChoiceSurveys($idPregunta,$opcion,$valor);
            header("Location: ".base_url()."admin/opcionMultipleEncuesta");
        }

        public function agregarOpcionSubencuesta(){
            $data['preguntas'] = $this->model->getQuestionsBySubsurvey(1);
            $this->views->getView($this,"agregar_opcion_multiple_subencuesta",$data);
        }

        public function guardarOpcionSubencuesta(){
            $idPregunta = $_POST["id_pregunta_subencuesta"];
            $opcion = $_POST["texto_respuesta"];
            $valor = $_POST["valor_numerico"];
            $this->model->addChoiceSubsurveys($idPregunta,$opcion,$valor);
            header("Location: ".base_url()."admin/opcionMultipleSubencuesta");
        }

        public function agregarPreguntaEncuesta(){
            $this->views->getView($this,"agregar_pregunta_encuesta");
        }

        public function guardarPreguntaEncuesta(){
            $idEncuesta = $_POST["id_encuesta"];
            $tipo = $_POST["tipo_pregunta"];
            $pregunta = $_POST["texto_pregunta"];
            $this->model->addQuestionSurvey($idEncuesta,$tipo,$pregunta);
            header("Location: ".base_url()."admin/preguntasEncuestas");
        }

        public function agregarPreguntaSubencuesta(){
            $this->views->getView($this,"agregar_pregunta_subencuesta");
        }

        public function guardarPreguntaSubencuesta(){
            $idSubencuesta = $_POST["id_subencuesta"];
            $tipo = $_POST["tipo_pregunta"];
            $pregunta = $_POST["texto_pregunta"];
            $this->model->addQuestionSubsurvey($idSubencuesta,$tipo,$pregunta);
            header("Location: ".base_url()."admin/preguntasSubencuestas");
        }

        public function agregarUsuario(){
            $this->views->getView($this,"agregar_usuario");
        }

        public function guardarUsuario(){
            $nombre = $_POST["nombre"];
            $numero = $_POST["numero_estudiante"];
            $correo = $_POST["correo"];
            $tipo = $_POST["tipo"];
            $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);
            $this->model->addUser($nombre,$numero,$correo,$tipo,$clave);
            header("Location: ".base_url()."admin/usuarios");
        }

        // -------------------------- ELIMINAR --------------------------

        public function eliminarOpcionEncuesta($id){
            $this->model->deleteChoiceSurveys($id);
            header("Location: ".base_url()."admin/opcionMultipleEncuesta");
        }

        public function eliminarOpcionSubencuesta($id){
            $this->model->deleteChoiceSubsurveys($id);
            header("Location: ".base_url()."admin/opcionMultipleSubencuesta");
        }

        public function eliminarPreguntaEncuesta($id){
            $this->model->deleteQuestionSurvey($id);
            header("Location: ".base_url()."admin/preguntasEncuestas");
        }

        public function eliminarPreguntaSubencuesta($id){
            $this->model->deleteQuestionSubsurvey($id);
            header("Location: ".base_url()."admin/preguntasSubencuestas");
        }

        public function eliminarRespuestaEncuesta($id){
            $this->model->deleteSurveyResponse($id);
            header("Location: ".base_url()."admin/respuestasEncuestas");
        }

        public function eliminarRespuestaSubencuesta($id){
            $this->model->deleteSubsurveyResponse($id);
            header("Location: ".base_url()."admin/respuestasSubencuestas");
        }

        public function eliminarUsuario($id){
            $this->model->deleteUser($id);
            header("Location: ".base_url()."admin/usuarios");
        }
        
    }

?>