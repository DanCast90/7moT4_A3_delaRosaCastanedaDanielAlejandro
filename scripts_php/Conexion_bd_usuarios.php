<?php

    class ConexionBDUsuarios {

        private $con;
        private $host="localhost";
        private $user = "root";
        private $password = "12345";
        private $db = "usuarios_escuela_web";
        
        public function __construct() {
            
            $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->db);

            if ($this->con) {
                echo "SE CONECTO CON EXITO" . "<br>";
            } else {
                die("ERROR EN LA CONEXION : " . mysqli_connect_error());
            }

        }

        public function getConection(){
            return $this->con;
        }

    }
    

?>