<?php

    include_once("Conexion_bd_usuarios.php");

    class LoginDAO {
        
        private $conexion;

        //Metodos
        // =============================================== Abrir =============================================== 
        public function abrirConexion(){
            $this->conexion = new ConexionBDUsuarios();
        }
        // ============================================== Validar ============================================== 
        public function validarInicioDeSecion($User, $Password){

            $User = SHA1($User);
            $Password = SHA1($Password);

            $sql = "SELECT * FROM usuarios WHERE nombre_usuario='$User' AND contrasena='$Password'";
    
            $resultado = mysqli_query($this->conexion->getConection(), $sql);
    
            if ( mysqli_num_rows($resultado) ) {
                return$resultado;
                return 1;
            } else {
                mysqli_error($this->conexion->getConection());
                return 0;
            }

        }
        public function validarUsuarioLibre($User){

            $User = SHA1($User);

            $sql = "SELECT * FROM usuarios WHERE nombre_usuario='$User'";
    
            $resultado = mysqli_query($this->conexion->getConection(), $sql);
    
            if ( mysqli_num_rows($resultado) ) {
                // return$resultado;
                return 1;
            } else {
                // mysqli_error($this->conexion->getConection());
                return 0;
            }

        }
        // =============================================== Nuevo =============================================== 
        public function nuevoUsuario($User, $Password){

            $User = SHA1($User);
            $Password = SHA1($Password);

            $stmt = mysqli_prepare($this->conexion->getConection(), "INSERT INTO usuarios VALUES (?,?)");
            mysqli_stmt_bind_param($stmt, 'ss', $User, $Password);
            mysqli_stmt_execute($stmt);
            printf("%d Row inserted.\n", mysqli_stmt_affected_rows($stmt));

            if ( mysqli_stmt_affected_rows($stmt) > 0 ) {
                mysqli_stmt_close($stmt);
                return true;
            } else {
                mysqli_stmt_close($stmt);
                return false;
            }
    

        }
        // ============================================== Cerrar ============================================== 
        public function cerrarConexion(){
            mysqli_close($this->conexion);
        }

    }
    

?>