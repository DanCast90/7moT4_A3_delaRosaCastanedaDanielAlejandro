<?php

    session_start();
    include_once('alumno_DAO.php');

    if (!empty($_POST)) {
        
        $_SESSION['espesifica'] = $_POST['buscarA']."";
        header("location:../vista/bajas.php");

    } else {
        echo "Esta vacio";
    }

?>