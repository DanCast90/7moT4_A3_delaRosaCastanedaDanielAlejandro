<?php

    class ConexionBD {

    		//PARA QUE FUNCIONE, DEBE ESTAR ACTIVO EL SERVICIO MYSQL80

        public $con;
        private $host="localhost";
        private $user = "root";
        private $password = "12345";
        private $db = "escuelaweb";
        
        public function __construct() {
            
            $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->db);

            if ($this->con) {
               // echo "Se  conecto" . "<br>";
            } else {
                die("No se conecto por: " . mysqli_connect_error());
            }

        }

        public function getConection(){
            return $this->con;
        }

    }
    

?>