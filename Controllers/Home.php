<?php 

    class home extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function inicio(){
            $data = $this->model->getAll();
            $this->views->getView($this,"home",$data);
        }

        public function agregar(){
            $data = "eo";
            $this->views->getView($this,"home_agregar",$data);
        }

        public function editar($id){
            $data['usuario'] = $this->model->getOne($id);
            $this->views->getView($this,"home_editar",$data);
        }

        public function eliminar($id){
            $this->model->delete($id);
        }

        public function addModel(){
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            
            $this->model->add($nombre,$edad);
        }

        public function updateOneModel(){
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $id = $_POST['id'];
            
            $this->model->updateOne($nombre,$edad,$id);
        }

        public function deleteModel($id){       
            $this->model->delete($nombre,$edad,$id);
        }
       
        
    }

?>