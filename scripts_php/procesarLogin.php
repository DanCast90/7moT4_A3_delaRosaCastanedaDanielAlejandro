<?php

    session_start();
    
    include_once("login_dao.php");

    $mLogin = new LoginDAO();

    if (isset($_GET) && !empty($_POST)) {
        
        $UserTEXT = $_POST['cajaUsuario'];
        $KeyTEXT = $_POST['cajaContraseña'];

        $mLogin->abrirConexion();
        $res = $mLogin->validarInicioDeSecion( $UserTEXT, $KeyTEXT);
        $mLogin->cerrarConexion();

        if ($res == 1) {
            $_SESSION['valido'] = true;
            $_SESSION['usuario'] = $_POST['cajaUsuario'];
            header("location:../vista/menu_principal.php");
        } else {
            header("location:../vista/Login_v3/index.html");
        }

    }else{
        echo "<br>Datos Faltantes";
    }

?>