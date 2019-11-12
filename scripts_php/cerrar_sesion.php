<?php

session_start();

session_unset();

session_destroy();

session_start();

header("location:../vista/Login_v3/index.html");

?>