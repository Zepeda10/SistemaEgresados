<?php 

    class LoginModel extends MySQL{

        public function __construct(){
            parent::__construct();
        }

        public function getUserAndPasswordAdmin($user, $pass){
            $query = "SELECT * from usuarios WHERE usuario = '$user' ";
            $request = $this->select($query);


            if ($request && count($request) > 0) {
                // Si se encontró un usuario con el número de estudiante dado
                $storedPassword = $request['clave'];

                // Verificar la contraseña usando password_verify
                if (password_verify($pass, $storedPassword)) {
                    return $request;
                }
            }

            // Si no se encontró el usuario o la contraseña no coincide
            return false;
        }

    }

?>