<?php 

    class AdminModel extends MySQL{

        public function __construct(){
            parent::__construct();
        }

        // ---------------- ENCUESTAS ----------------------

        public function getAllHeaderSurveys(){
            $query = "SELECT * from encuestas_principales";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllHeaderSubsurveys(){
            $query = "SELECT * from subencuestas";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllSurveys(){
            $query = "SELECT * from preguntas";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllSubsurveys(){
            $query = "SELECT * from preguntas_subencuestas";
            $request = $this->select_all($query);

            return $request;
        }

        public function getAllUsers(){
            $query = "SELECT * from usuarios";
            $request = $this->select_all($query);

            return $request;
        }

        
    }

?>