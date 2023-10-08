<?php 

    class HomeModel extends MySQL{

        public function __construct(){
            parent::__construct();
        }

        public function add($nombre, $edad){
            $query = "INSERT INTO ejemplo(nombre,edad) VALUES (?,?)";

            $arrData = array($nombre,$apellidos,$user,$pass,$rol);
            $request = $this->insert($query,$arrData);

            return $request;
        }

        public function getAll(){
            $query = "SELECT * from ejemplo";
            $request = $this->select_all($query);

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