<?php 

    class AdminModel extends MySQL{

        public function __construct(){
            parent::__construct();
        }

        // ---------------- MOSTRAR DATOS EN FRONT ----------------------

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
            $query = "SELECT * FROM respuestas_opciones";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllmultipleChoiceSubsurveys(){
            $query = "SELECT * FROM respuestas_opciones_subencuestas";
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
            $query = "SELECT * FROM respuestas_usuarios_encuestas";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllSubsurveysResponses(){
            $query = "SELECT * FROM respuestas_usuarios_subencuestas";
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


        
    }

?>