<?php

    session_start();

    if ( $_SESSION['valido'] == false ) {
        header("location:/practicas_PHP/SistemaABCC/vista/Login_v3/index.html");
    } else {
        header("location:/practicas_PHP/SistemaABCC/vista/registro/registro.html");
    }

?>
