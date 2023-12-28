<?php 

    class LoginModel extends MySQL{

        public function __construct(){
            parent::__construct();
        }

        public function getUserAndPassword($idEstudiante, $pass){
            $query = "SELECT * from usuarios WHERE numero_estudiante = '$idEstudiante' and tipo = 'estudiante' ";
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

        public function getUserAndPasswordAdmin($idEstudiante, $pass){
            $query = "SELECT * from usuarios WHERE numero_estudiante = '$idEstudiante' AND tipo = 'admin' ";
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

        public function addNewUser($nombre,$id,$correo,$tipo,$pass){
            $query = "INSERT INTO usuarios(nombre,numero_estudiante,correo,tipo,clave) VALUES (?,?,?,?,?)";

            $arrData = array($nombre,$id,$correo,$tipo,$pass);
            $request = $this->insert($query,$arrData);

            return $request;
        }


    }

?>