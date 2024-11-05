<?php 

    class login extends Controllers{
        
        public function __construct(){
            parent::__construct();
        }

        public function admin(){
            $this->views->getView($this,"login_admin");
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


        public function logout(){
            header("Location: ".base_url()."login/admin");
        }
        
    }

?>