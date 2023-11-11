<?php 

    class EncuestaUnoModel extends MySQL{

        public function __construct(){
            parent::__construct();
        }

        public function getAllQuestions(){
            $query = "SELECT * from preguntas WHERE id_encuesta = 1";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllCloseAnswers(){
            $query = "SELECT * from respuestas";
            $request = $this->select_all($query);

            return $request;
        }

        public function addCloseAnswer($idPregunta,$texto,$numero){
            $query = "INSERT INTO respuestas(id_pregunta,texto_respuesta,valor_numerico) VALUES (?,?,?)";

            $arrData = array($idPregunta,$texto,$numero);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function addOpenAnswer($idPregunta,$texto){
            $query = "INSERT INTO respuestas_abiertas(id_pregunta,texto_respuesta_abierta) VALUES (?,?)";

            $arrData = array($idPregunta,$texto);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        
        // EXTRAS...

        public function add2($nombre, $edad){
            $query = "INSERT INTO ejemplo(nombre,edad) VALUES (?,?)";

            $arrData = array($nombre,$apellidos,$user,$pass,$rol);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function getOne($id){
            $query = "SELECT * FROM ejemplo WHERE id = $id";
            $request = $this->select($query);

            return $request;
        }

        public function updateOne($nombre, $edad, $id){
            $query = "UPDATE ejemplo SET nombre = '".$nombre."' , edad = '".$edad."' WHERE id = $id";
            $request = $this->update($query);

            return $request;
        }

        public function delete($id){
            $query = "DELETE FROM ejemplo WHERE id = ".$id;
            $request = $this->delete($query);

            return $request; 
        }

    }

?>