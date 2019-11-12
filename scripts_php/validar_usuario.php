<?php

    include_once(ConexionBDUsuarios);

    class ValidarInicio {

        private $conexion;

        public function __construct() {
            $this->conexion = new ConexionBDUsuarios();
        }

        public function validarInicioDeSecion($User, $Password){

            $User = SHA1($User);
            $Password = SHA1($Password);

            $sql = "SELECT * FROM usuarios WHERE nombre_usuario='$User' AND contrasena='$Password'";
    
            $resultado = mysqli_query($this->conexion->getConection(), $sql);
    
            if ( mysqli_num_rows($resultado) ) {
                return$resultado;
                header("location:../vistas/menu_principal.html");
            } else {
                echo "<br> FRACASO EN CONSULTA";
                mysqli_error($this->conexion->getConection());
            }
    
    
        }   

    }

?>