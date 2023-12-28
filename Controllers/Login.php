<?php 

    class login extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function login(){
            $this->views->getView($this,"login");
        }
        
        public function registro(){
            $this->views->getView($this,"registro");
        } 
        
        public function iniciarSesion(){
            $id = $_POST['id_estudante'];
            $pass = $_POST['password'];

            $credentials = $this->model->getUserAndPassword($id, $pass);

            if ($credentials) {
                header("Location: ".home_url());
                exit;
            } else {
                echo "El usuaro no existe";
            }
        }

        public function registrarse(){
            $id = $_POST['numero_estudiante'];
            $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $tipo = "estudiante";

            $this->model->addNewUser($nombre,$id,$correo,$tipo,$pass);

            header("Location: ".base_url()."login/login");
            exit;
        }
        
    }

?>