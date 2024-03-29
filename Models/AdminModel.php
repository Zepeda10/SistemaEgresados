<?php 

    class AdminModel extends MySQL{

        public function __construct(){
            parent::__construct();
        }

        // ---------------- AUXILIARES ----------------------
        public function getQuestionsBySurvey($id){
            $query = "SELECT id_pregunta, texto_pregunta FROM preguntas WHERE id_encuesta = $id";
            $request = $this->select_all($query);

            return $request;
        } 

        public function getQuestionsBySubsurvey($id){
            $query = "SELECT id_pregunta_subencuesta, texto_pregunta FROM preguntas_subencuestas WHERE id_subencuesta = $id";
            $request = $this->select_all($query);

            return $request;
        } 


        // ---------------- MOSTRAR DATOS EN VISTAS ----------------------

        public function getAllHeaderSurveys(){
            $query = "SELECT * FROM encuestas_principales";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllHeaderSubsurveys(){
            $query = "SELECT * FROM subencuestas";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllmultipleChoiceSurveys(){
            $query = "SELECT r.id_respuesta, p.texto_pregunta, r.texto_respuesta, r.valor_numerico FROM respuestas_opciones r INNER JOIN preguntas p ON r.id_pregunta = p.id_pregunta";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllmultipleChoiceSubsurveys(){
            $query = "SELECT r.id_respuesta, p.texto_pregunta, r.texto_respuesta, r.valor_numerico FROM respuestas_opciones_subencuestas r INNER JOIN preguntas_subencuestas p ON r.id_pregunta_subencuesta = p.id_pregunta_subencuesta";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllSurveys(){
            $query = "SELECT * FROM preguntas";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllSubsurveys(){
            $query = "SELECT * FROM preguntas_subencuestas";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllSurveysResponses(){
            $query = "SELECT r.id_respuesta_usuario, u.numero_estudiante, r.id_encuesta, p.texto_pregunta, o.texto_respuesta AS 'opcion', r.texto_respuesta_abierta, r.fecha_respuesta FROM respuestas_usuarios_encuestas r 
            INNER JOIN usuarios u ON r.id_usuario = u.id_usuario INNER JOIN preguntas p ON r.id_pregunta = p.id_pregunta LEFT JOIN respuestas_opciones o ON r.id_respuesta_opciones = o.id_respuesta ORDER BY r.id_respuesta_usuario ASC";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllSubsurveysResponses(){
            $query = "SELECT r.id_respuesta_usuario, u.numero_estudiante, r.id_subencuesta, p.texto_pregunta, o.texto_respuesta AS 'opcion', r.texto_respuesta_abierta, r.fecha_respuesta FROM respuestas_usuarios_subencuestas r 
            INNER JOIN usuarios u ON r.id_usuario = u.id_usuario INNER JOIN preguntas_subencuestas p ON r.id_pregunta = p.id_pregunta_subencuesta LEFT JOIN respuestas_opciones_subencuestas o ON r.id_respuesta_opciones = o.id_respuesta ORDER BY r.id_respuesta_usuario ASC";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllUsers(){
            $query = "SELECT * FROM usuarios";
            $request = $this->select_all($query);

            return $request;
        }


        // -------------------------- EDITAR --------------------------
        public function getOneHeaderSurvey($id){
            $query = "SELECT * FROM encuestas_principales WHERE id_encuesta = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateHeaderSurvey($titulo,$id){
            $query = "UPDATE encuestas_principales SET titulo_encuesta = '$titulo' WHERE id_encuesta = $id";
            $request = $this->update($query);

            return $request;
        }

        public function getOneHeaderSubsurvey($id){
            $query = "SELECT * FROM subencuestas WHERE id_subencuesta = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateHeaderSubsurvey($titulo,$descripcion,$id){
            $query = "UPDATE subencuestas SET titulo = '$titulo', descripcion = '$descripcion' WHERE id_subencuesta = $id";
            $request = $this->update($query);

            return $request;
        }

        public function getOneChoiceSurveys($id){
            $query = "SELECT * FROM respuestas_opciones WHERE id_respuesta = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateChoiceSurveys($id,$idPregunta,$opcion,$valor){
            $query = "UPDATE respuestas_opciones SET id_pregunta = $idPregunta , texto_respuesta = '$opcion' , valor_numerico = $valor WHERE id_respuesta = $id";
            $request = $this->update($query);

            return $request;
        }

        public function getOneChoiceSubsurveys($id){
            $query = "SELECT * FROM respuestas_opciones_subencuestas WHERE id_respuesta = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateChoiceSubsurveys($id,$idPregunta,$opcion,$valor){
            $query = "UPDATE respuestas_opciones_subencuestas SET id_pregunta_subencuesta = $idPregunta , texto_respuesta = '$opcion' , valor_numerico = $valor WHERE id_respuesta = $id";
            $request = $this->update($query);

            return $request;
        }

        public function getOneQuestionSurvey($id){
            $query = "SELECT * FROM preguntas WHERE id_pregunta = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateQuestionSurvey($id,$idEncuesta,$tipo,$pregunta){
            $query = "UPDATE preguntas SET id_encuesta = $idEncuesta , tipo_pregunta = '$tipo' , texto_pregunta = '$pregunta' WHERE id_pregunta = $id";
            $request = $this->update($query);

            return $request;
        }

        public function getOneQuestionSubsurvey($id){
            $query = "SELECT * FROM preguntas_subencuestas WHERE id_pregunta_subencuesta = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateQuestionSubsurvey($id,$idSubencuesta,$tipo,$pregunta){
            $query = "UPDATE preguntas_subencuestas SET id_subencuesta = $idSubencuesta , tipo_pregunta = '$tipo' , texto_pregunta = '$pregunta' WHERE id_pregunta_subencuesta = $id";
            $request = $this->update($query);

            return $request;
        }

        public function getOneUser($id){
            $query = "SELECT * FROM usuarios WHERE id_usuario = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateUser($id,$nombre,$numero,$correo,$tipo){
            $query = "UPDATE usuarios SET nombre = '$nombre' , numero_estudiante = '$numero' , correo = '$correo' , tipo = '$tipo' WHERE id_usuario = $id";
            $request = $this->update($query);

            return $request;
        }

        // -------------------------- AGREGAR --------------------------
        public function addChoiceSurveys($idPregunta,$opcion,$valor){
            $query = "INSERT INTO respuestas_opciones (id_pregunta,texto_respuesta,valor_numerico) VALUES (?,?,?)";

            $arrData = array($idPregunta,$opcion,$valor);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function addChoiceSubsurveys($idPregunta,$opcion,$valor){
            $query = "INSERT INTO respuestas_opciones_subencuestas (id_pregunta_subencuesta,texto_respuesta,valor_numerico) VALUES (?,?,?)";

            $arrData = array($idPregunta,$opcion,$valor);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function addQuestionSurvey($idEncuesta,$tipo,$pregunta){
            $query = "INSERT INTO preguntas (id_encuesta,tipo_pregunta,texto_pregunta) VALUES (?,?,?)";

            $arrData = array($idEncuesta,$tipo,$pregunta);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function addQuestionSubsurvey($idSubencuesta,$tipo,$pregunta){
            $query = "INSERT INTO preguntas_subencuestas (id_subencuesta,tipo_pregunta,texto_pregunta) VALUES (?,?,?)";

            $arrData = array($idSubencuesta,$tipo,$pregunta);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function addUser($nombre,$numero,$correo,$tipo,$clave){
            $query = "INSERT INTO usuarios (nombre,numero_estudiante,correo,tipo,clave) VALUES (?,?,?,?,?)";

            $arrData = array($nombre,$numero,$correo,$tipo,$clave);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        // -------------------------- ELIMINAR --------------------------
        public function deleteChoiceSurveys($id){
            $query = "DELETE FROM respuestas_opciones WHERE id_respuesta = ".$id;
            $request = $this->delete($query);

            return $request; 
        }

        public function deleteChoiceSubsurveys($id){
            $query = "DELETE FROM respuestas_opciones_subencuestas WHERE id_respuesta = ".$id;
            $request = $this->delete($query);

            return $request; 
        }

        public function deleteQuestionSurvey($id){
            $query = "DELETE FROM preguntas WHERE id_pregunta = ".$id;
            $request = $this->delete($query);

            return $request; 
        }

        public function deleteQuestionSubsurvey($id){
            $query = "DELETE FROM preguntas_subencuestas WHERE id_pregunta_subencuesta = ".$id;
            $request = $this->delete($query);

            return $request; 
        }

        public function deleteUser($id){
            $query = "DELETE FROM usuarios WHERE id_usuario = ".$id;
            $request = $this->delete($query);

            return $request; 
        }

        public function deleteSurveyResponse($id){
            $query = "DELETE FROM respuestas_usuarios_encuestas WHERE id_respuesta_usuario = ".$id;
            $request = $this->delete($query);

            return $request; 
        }

        public function deleteSubsurveyResponse($id){
            $query = "DELETE FROM respuestas_usuarios_subencuestas WHERE id_respuesta_usuario = ".$id;
            $request = $this->delete($query);

            return $request; 
        }
        
    }

?>