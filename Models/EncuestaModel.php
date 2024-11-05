<?php 

    class EncuestaModel extends MySQL{

        public function __construct(){
            parent::__construct();
        }

        public function getAllQuestions($id){
            $query = "SELECT * from preguntas WHERE id_encuesta = $id";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllCloseAnswers(){
            $query = "SELECT * from respuestas_opciones";
            $request = $this->select_all($query);

            return $request;
        }

        public function addUsersAnswers($idEncuesta,$idPregunta,$idRespuestaOpcion,$texto){
            $query = "INSERT INTO respuestas_usuarios_encuestas(id_encuesta,id_pregunta,id_respuesta_opciones,texto_respuesta_abierta) VALUES (?,?,?,?)";

            $arrData = array($idEncuesta,$idPregunta,$idRespuestaOpcion,$texto);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function getTitle($id){
            $query = "SELECT titulo_encuesta FROM encuestas_principales WHERE id_encuesta = $id";
            $request = $this->select($query);

            // Verificar si el resultado es válido y retornar el campo 'titulo_encuesta'
            if ($request && isset($request['titulo_encuesta'])) {
                return $request['titulo_encuesta']; 
            }

            return null; // Retorna null si no se encuentra el título
        }

    }

?>