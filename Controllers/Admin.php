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

        public function opcionMultipleEncuesta(){
            $data["opciones"] = $this->model->getAllmultipleChoiceSurveys();
            $this->views->getView($this,"opcion_multiple_encuesta",$data);
        }

        public function preguntasEncuestas(){
            $data["preguntas"] = $this->model->getAllSurveys();
            $this->views->getView($this,"preguntas_encuestas",$data);
        }

        public function respuestasEncuestas(){
            $data["respuestas"] = $this->model->getAllSurveysResponses();
            $this->views->getView($this,"respuestas_encuestas",$data);
        }


        public function usuarios(){
            $data["usuarios"] = $this->model->getAllUsers();
            $this->views->getView($this,"usuarios",$data);
        }

        public function graficas(){
            // $data["graficas"] = $this->model->getAllUsers();
            $this->views->getView($this,"generar_graficos");
        }


        public function mostrarGraficas(){
            $encuesta = $_GET['encuesta'] ?? null;
            $fechaInicio = $_GET['fechaInicio'] ?? null;
            $fechaFin = $_GET['fechaFin'] ?? null;

            if ($encuesta && $fechaInicio && $fechaFin) {
                // Obtener los datos de la base de datos
                $data["graficas"] = $this->model->graphQuery($encuesta, $fechaInicio, $fechaFin);

                // Agrupar las respuestas por pregunta
                $agrupadoPorPregunta = [];
                foreach ($data["graficas"] as $respuesta) {
                    // Agrupar las respuestas por la pregunta
                    $agrupadoPorPregunta[$respuesta['texto_pregunta']][] = $respuesta;
                }

                // Ahora $agrupadoPorPregunta contiene las respuestas agrupadas por pregunta.
                $data["graficasAgrupadas"] = $agrupadoPorPregunta;
            } else {
                $data["graficasAgrupadas"] = [];
            }



           $this->views->getView($this, "graficos", $data);
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

        public function editarOpcionEncuesta($id){
            $data["opcion"] = $this->model->getOneChoiceSurveys($id);
            $data['preguntas'] = $this->model->getQuestionsBySurvey();
            $this->views->getView($this,"editar_opcion_multiple_encuesta",$data);
        }

        public function actualizarOpcionEncuesta(){
            $id = $_POST["id_respuesta"];
            $idPregunta = $_POST["id_pregunta"];
            $opcion = $_POST["texto_respuesta"];
            $this->model->updateChoiceSurveys($id,$idPregunta,$opcion);
            header("Location: ".base_url()."admin/opcionMultipleEncuesta");
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

        public function editarUsuario($id){
            $data["usuario"] = $this->model->getOneUser($id);
            $this->views->getView($this,"editar_usuario",$data);
        }

        public function actualizarUsuario(){
            $id = $_POST["id_usuario"];
            $nombre = $_POST["nombre_completo"];
            $usuario = $_POST["usuario"];
            $correo = $_POST["correo"];
            $this->model->updateUser($id,$nombre,$usuario,$correo);
            header("Location: ".base_url()."admin/usuarios");
        }

        // -------------------------- AGREGAR --------------------------
        public function agregarOpcionEncuesta(){
            $data['preguntas'] = $this->model->getQuestionsBySurvey();
           $this->views->getView($this,"agregar_opcion_multiple_encuesta",$data);
        }

        public function guardarOpcionEncuesta(){
            $idPregunta = $_POST["id_pregunta"];
            $opcion = $_POST["texto_respuesta"];
            $this->model->addChoiceSurveys($idPregunta,$opcion);
            header("Location: ".base_url()."admin/opcionMultipleEncuesta");
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

        public function agregarUsuario(){
            $this->views->getView($this,"agregar_usuario");
        }

        public function guardarUsuario(){
            $usuario = $_POST["usuario"];
            $nombre = $_POST["nombre_completo"];
            $correo = $_POST["correo"];
            $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);
            $this->model->addUser($usuario,$nombre,$correo,$clave);
            header("Location: ".base_url()."admin/usuarios");
        }

        // -------------------------- ELIMINAR --------------------------

        public function eliminarOpcionEncuesta($id){
            $this->model->deleteChoiceSurveys($id);
            header("Location: ".base_url()."admin/opcionMultipleEncuesta");
        }

        public function eliminarPreguntaEncuesta($id){
            $this->model->deleteQuestionSurvey($id);
            header("Location: ".base_url()."admin/preguntasEncuestas");
        }

        public function eliminarRespuestaEncuesta($id){
            $this->model->deleteSurveyResponse($id);
            header("Location: ".base_url()."admin/respuestasEncuestas");
        }

        public function eliminarUsuario($id){
            $this->model->deleteUser($id);
            header("Location: ".base_url()."admin/usuarios");
        }

        // -------------------------- BUSCAR --------------------------
        public function buscarPreguntasFiltradas() {
            $filtroEncuesta = $_GET["filtroEncuesta"];
            $filtroTipo = $_GET["filtroTipo"];
            $filtroPregunta = $_GET["filtroPregunta"];

            $data["preguntas"] = $this->model->obtenerPreguntasFiltradas($filtroEncuesta, $filtroTipo, $filtroPregunta);

            $this->views->getView($this,"preguntas_encuestas", $data);
        }

        public function buscarRespuestasFiltradas() {
            $filtroEncuesta = $_GET["filtroEncuesta"];
            $filtroPregunta = $_GET["filtroPregunta"];

            $data["respuestas"] = $this->model->obtenerRespuestasFiltradas($filtroEncuesta, $filtroPregunta);

            $this->views->getView($this,"respuestas_encuestas", $data);
        }

        public function buscarOpcionesFiltradas() {
            $filtroPregunta = $_GET["filtroPregunta"];

            $data["opciones"] = $this->model->obtenerOpcionesFiltradas($filtroPregunta);

            $this->views->getView($this,"opcion_multiple_encuesta", $data);
        }

        public function buscarUsuariosFiltrados() {
            $filtroUsuario = $_GET["filtroUsuario"];

            $data["usuarios"] = $this->model->obtenerUsuariosFiltrados($filtroUsuario);

            $this->views->getView($this,"usuarios", $data);
        }
        
    }
    
?>