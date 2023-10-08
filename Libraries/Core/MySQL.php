<?php 

    class MySQL extends Conexion{
        private $conexion;
        private $strQuery;
        private $arrValues;

        public function __construct(){
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }


        //Insertar registro
        public function insert(string $strQuery, array $arrValues){
            $this->strQuery = $strQuery;
            $this->arrValues = $arrValues;
            $insert = $this->conexion->prepare($this->strQuery);
            $res = $insert->execute($this->arrValues);

            if($res){
                $lastInsert = $this->conexion->lastInsertId();
            }else{
                $lastInsert = 0;
            }

            return $lastInsert;
        }

        //Buscar un registro
        public function select(string $strQuery){
            $this->strQuery = $strQuery;
            $result = $this->conexion->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);

            return $data;
        }

        //Devuelve todos los registros
        public function select_all(string $strQuery){
            $this->strQuery = $strQuery;
            $result = $this->conexion->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);

            return $data;
        }

        //Actualiza registro
        public function update(string $strQuery){
            $this->strQuery = $strQuery;
            $update = $this->conexion->prepare($this->strQuery);
            $res = $update->execute();

            return $res;
        }

        //Eliminar registro
        public function delete(string $strQuery){
            $this->strQuery = $strQuery;
            $result = $this->conexion->prepare($this->strQuery);
            $result->execute();

            return $result;
        }

        //Último ID insertado
        public function ultimoId(){
            return $this->conexion->lastInsertId();
        }

    }

?>