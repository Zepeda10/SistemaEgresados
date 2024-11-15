<?php 

class login extends Controllers {
    
    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function admin() {

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            header("Location: " . base_url() . "admin/inicio");
            exit;
        }
        $this->views->getView($this, "login_admin");
    }

    public function iniciarSesionAdmin() {
        $id = $_POST['nombre_usuario'];
        $pass = $_POST['password'];
        $credentials = $this->model->getUserAndPasswordAdmin($id, $pass);

        if ($credentials) {
            $_SESSION['loggedin'] = true;
            $_SESSION['nombre_usuario'] = $id;
            header("Location: " . base_url() . "admin/inicio");
            exit;
        } else {
            header("Location: " . base_url() . "login/admin?error=usuario_no_existe");
            exit;
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: " . base_url() . "login/admin");
        exit;
    }
}

?>
