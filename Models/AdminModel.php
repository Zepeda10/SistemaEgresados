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

        // ---------------- MOSTRAR DATOS EN VISTAS ----------------------

        public function getAllHeaderSurveys(){
            $query = "SELECT * FROM encuestas_principales";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllmultipleChoiceSurveys(){
            $query = "SELECT r.id_respuesta, p.texto_pregunta, r.texto_respuesta FROM respuestas_opciones r INNER JOIN preguntas p ON r.id_pregunta = p.id_pregunta";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllSurveys(){
            $query = "SELECT * FROM preguntas";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllSurveysResponses(){
            $query = "SELECT r.id_respuesta_usuario, r.id_encuesta, p.texto_pregunta, 
            o.texto_respuesta AS 'opcion', r.texto_respuesta_abierta, 
            r.fecha_respuesta 
     FROM respuestas_usuarios_encuestas r
     INNER JOIN preguntas p ON r.id_pregunta = p.id_pregunta
     LEFT JOIN respuestas_opciones o ON r.id_respuesta_opciones = o.id_respuesta
     ORDER BY r.id_respuesta_usuario ASC;";
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

        public function getOneChoiceSurveys($id){
            $query = "SELECT * FROM respuestas_opciones WHERE id_respuesta = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateChoiceSurveys($id,$idPregunta,$opcion,$valor){
            $query = "UPDATE respuestas_opciones SET id_pregunta = $idPregunta , texto_respuesta = '$opcion' WHERE id_respuesta = $id";
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

        public function getOneUser($id){
            $query = "SELECT * FROM usuarios WHERE id_usuario = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateUser($id,$nombre,$usuario,$correo){
            $query = "UPDATE usuarios SET nombre_completo = '$nombre' , usuario = '$usuario' , correo = '$correo' WHERE id_usuario = $id";
            $request = $this->update($query);

            return $request;
        }

        // -------------------------- AGREGAR --------------------------
        public function addChoiceSurveys($idPregunta,$opcion){
            $query = "INSERT INTO respuestas_opciones (id_pregunta,texto_respuesta) VALUES (?,?)";

            $arrData = array($idPregunta,$opcion);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function addQuestionSurvey($idEncuesta,$tipo,$pregunta){
            $query = "INSERT INTO preguntas (id_encuesta,tipo_pregunta,texto_pregunta) VALUES (?,?,?)";

            $arrData = array($idEncuesta,$tipo,$pregunta);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function addUser($usuario,$nombre,$correo,$clave){
            $query = "INSERT INTO usuarios (usuario,nombre_completo,correo,clave) VALUES (?,?,?,?)";

            $arrData = array($usuario,$nombre,$correo,$clave);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        // -------------------------- ELIMINAR --------------------------
        public function deleteChoiceSurveys($id){
            $query = "DELETE FROM respuestas_opciones WHERE id_respuesta = ".$id;
            $request = $this->delete($query);

            return $request; 
        }

        public function deleteQuestionSurvey($id){
            $query = "DELETE FROM preguntas WHERE id_pregunta = ".$id;
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


        // -------------------------- BUSCAR --------------------------
        public function obtenerPreguntasFiltradas($encuesta, $tipo, $pregunta) {
            // Construimos la consulta base
            $query = "SELECT * FROM preguntas WHERE 1=1";
        
            // Condiciones para cada filtro, si existen
            if (!empty($encuesta)) {
                $query .= " AND id_encuesta = '$encuesta'";
            }
            if (!empty($tipo)) {
                $query .= " AND tipo_pregunta = '$tipo'";
            }
            if (!empty($pregunta)) {
                $query .= " AND texto_pregunta LIKE '%$pregunta%'";
            }

            $request = $this->select_all($query);
        
            return $request;
        }

        public function obtenerRespuestasFiltradas($encuesta, $pregunta) {
            $query = "SELECT r.id_respuesta_usuario, r.id_encuesta, p.texto_pregunta, 
                             o.texto_respuesta AS 'opcion', r.texto_respuesta_abierta, 
                             r.fecha_respuesta 
                      FROM respuestas_usuarios_encuestas r
                      INNER JOIN preguntas p ON r.id_pregunta = p.id_pregunta
                      LEFT JOIN respuestas_opciones o ON r.id_respuesta_opciones = o.id_respuesta
                      WHERE 1=1";
        

            if (!empty($encuesta)) {
                $query .= " AND r.id_encuesta = " . intval($encuesta);
            }

            if (!empty($pregunta)) {
                $sanitizedPregunta = htmlspecialchars($pregunta, ENT_QUOTES, 'UTF-8');
                $query .= " AND p.texto_pregunta LIKE '%" . $sanitizedPregunta . "%'";
            }
 
            $query .= " ORDER BY r.id_respuesta_usuario ASC";

            $request = $this->select_all($query);
        
            return $request;
        }
        
        public function obtenerOpcionesFiltradas($pregunta) {
            $pregunta = htmlspecialchars($pregunta, ENT_QUOTES, 'UTF-8');
    
            $query = "SELECT r.id_respuesta, p.texto_pregunta, r.texto_respuesta 
                      FROM respuestas_opciones r 
                      INNER JOIN preguntas p ON r.id_pregunta = p.id_pregunta 
                      WHERE p.texto_pregunta LIKE '%" . $pregunta . "%'";
        
            $request = $this->select_all($query);
        
            return $request;
        }
        

        public function obtenerUsuariosFiltrados($usuario) {
            $query = "SELECT * from usuarios WHERE usuario LIKE '%$usuario%'";
            $request = $this->select_all($query);
        
            return $request;
        }


        // -------------------------- GRAFICAR --------------------------
        public function graphQuery($encuesta, $fechaInicio, $fechaFin){
            $query = "SELECT ro.texto_respuesta, COUNT(*) AS total_respuestas, p.texto_pregunta
            FROM respuestas_usuarios_encuestas rue
            INNER JOIN respuestas_opciones ro ON rue.id_respuesta_opciones = ro.id_respuesta
            INNER JOIN preguntas p ON rue.id_pregunta = p.id_pregunta
            WHERE rue.id_encuesta = $encuesta 
            AND rue.fecha_respuesta BETWEEN '$fechaInicio' AND '$fechaFin'
            AND rue.id_respuesta_opciones IS NOT NULL
            GROUP BY ro.texto_respuesta
            ORDER BY total_respuestas DESC";

            $request = $this->select_all($query);


            return $request;
          

            /*
            $datos = [
                ['opcion' => 'Opción A', 'total_respuestas' => 35],
                ['opcion' => 'Opción B', 'total_respuestas' => 27],
                ['opcion' => 'Opción C', 'total_respuestas' => 18],
                ['opcion' => 'Opción D', 'total_respuestas' => 10],
            ];
            return $datos;
            */
        }
        
    }

?> 