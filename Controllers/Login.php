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

        public function admin(){
            $this->views->getView($this,"login_admin");
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

        public function iniciarSesionAdmin(){
            $id = $_POST['nombre_usuario'];
            $pass = $_POST['password'];

            $credentials = $this->model->getUserAndPasswordAdmin($id, $pass);

            if ($credentials) {
                header("Location: ".base_url()."admin/inicio");
                exit;
            } else {
                echo "El admin no existe";
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

        public function logout(){
            header("Location: ".base_url()."login/admin");
        }
        
    }

?>