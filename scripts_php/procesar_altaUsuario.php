<?php

    session_start();

    include_once("login_dao.php");
    $mLogin = new LoginDAO();

    $error_User = "";
    $error_Password = "";
    $error_Confirmacion = ""; 
    $error_Registro = "";

    

    // ================================================ Valida la existencia de la variable ================================================
    if ( isset($_POST['cajaNumControl']) && isset($_POST['cajaContrasena']) && isset($_POST['confirmarCajaContrasena']) ) {
        // ================================================ valida que la variable no este vacia ================================================
        if ( !empty($_POST['cajaNumControl']) && !empty($_POST['cajaContrasena']) && !empty($_POST['confirmarCajaContrasena']) ) {
            if ( $_POST['cajaContrasena'] != $_POST['confirmarCajaContrasena']) {
                $error_Confirmacion = "Confirme su contraseña correctamente.";
                $_SESSION['error_confirmacion'] = $error_Confirmacion;

                //Preparando datos previamente cargados para su retorno
                if ( isset($_POST['cajaNumControl']) && !empty($_POST['cajaNumControl']) ) {
                    $_SESSION['usuario'] = $_POST['cajaNumControl'];
                }
                if ( isset($_POST['cajaContrasena']) && !empty($_POST['cajaContrasena']) ) {
                    $_SESSION['contrasena'] = $_POST['cajaContrasena'];
                }
                if ( isset($_POST['confirmarCajaContrasena']) && !empty($_POST['confirmarCajaContrasena']) ) {
                    $_SESSION['confirmacion'] = $_POST['confirmarCajaContrasena'];
                }
                
                var_dump($_SESSION);

                //Redirige para completar o corregir formulario de registro
                header("location:../Vistas/registro.php");
            } else {
                // ================================================ Valida que no exista el usuario. ================================================
                $mLogin->abrirConexion();
                $res = $mLogin->validarUsuarioLibre( $_POST['cajaNumControl'] );
                $mLogin->cerrarConexion();

                if ($res == 0) {// si es 0 es que no encontro usuario con el mismo nombre
                    // ================================================ Valida el numero de control. ================================================
                    if ( strlen($_POST['cajaNumControl']) == 8 ) {
                        $usuario = $_POST['cajaNumControl'];
                        $contraseña = $_POST['cajaContrasena'];
        
                        // $usuario = limpiar_Cadena($usuario);
                        // $contraseña = limpiar_Cadena($contraseña);
        
                        $mLogin->abrirConexion();
                        $nuevo = $mLogin->nuevoUsuario( $usuario, $contraseña);
                        // $mLogin->cerrarConexion();

                        $_SESSION['usuarioAgregado'] = "Usuario agregado con exito";

                        var_dump($nuevo);

                        if ( $nuevo == true ) {
                            session_start();

                            // $mLogin->abrirConexion();
                            $res = $mLogin->validarInicioDeSecion( $usuario, $contraseña);
                            $mLogin->cerrarConexion();

                            if ($res == 1) {
                                $_SESSION['valido'] = true;
                                $_SESSION['usuario'] = $_POST['cajaUsuario'];
                                header("location:../vistas/menu_principal.php");
                            } else {
                                header("location:../vistas/Login_vF/login.php");
                            }
                        } else {
                            $mLogin->cerrarConexion();
                            $_SESSION['usuarioAgregado'] = "Usuario NO AGREGADO";
                            header("location:../Vistas/registro.php");
                        }
                    } else {
                        $error_User = "El usuario debe ser de 8 caracteres.";
                        $_SESSION['error_usuario'] = $error_User;
                        
                        //Preparando datos previamente cargados para su retorno
                        if ( isset($_POST['cajaNumControl']) && !empty($_POST['cajaNumControl']) ) {
                            $_SESSION['usuario'] = $_POST['cajaNumControl'];
                        }
                        if ( isset($_POST['cajaContrasena']) && !empty($_POST['cajaContrasena']) ) {
                            $_SESSION['contrasena'] = $_POST['cajaContrasena'];
                        }
                        if ( isset($_POST['confirmarCajaContrasena']) && !empty($_POST['confirmarCajaContrasena']) ) {
                            $_SESSION['confirmacion'] = $_POST['confirmarCajaContrasena'];
                        }
                        
                        var_dump($_SESSION);

                        //Redirige para completar o corregir formulario de registro
                        header("location:../Vistas/registro.php");

                    }
                } else {
                    $error_User = "Usuario no disponible";
                    $_SESSION['error_usuario'] = $error_User;
                    //Preparando datos previamente cargados para su retorno
                    if ( isset($_POST['cajaNumControl']) && !empty($_POST['cajaNumControl']) ) {
                        $_SESSION['usuario'] = $_POST['cajaNumControl'];
                    }
                    if ( isset($_POST['cajaContrasena']) && !empty($_POST['cajaContrasena']) ) {
                        $_SESSION['contrasena'] = $_POST['cajaContrasena'];
                    }
                    if ( isset($_POST['confirmarCajaContrasena']) && !empty($_POST['confirmarCajaContrasena']) ) {
                        $_SESSION['confirmacion'] = $_POST['confirmarCajaContrasena'];
                    }

                    var_dump($_SESSION);
                    
                    //Redirige para completar o corregir formulario de registro
                    header("location:../Vistas/registro.php");
                }   
            }
        } else {
            if ( empty($_POST['cajaNumControl']) ) {
                $error_User = "Sin Usuario.";
                $_SESSION['error_usuario'] = $error_User;
            }
            if ( empty($_POST['cajaContrasena']) ) {
                $error_Password = "Sin contraseña.";
                $_SESSION['error_password'] = $error_Password;
            }
            if ( empty($_POST['confirmarCajaContrasena']) ) {
                $error_Confirmacion = "Confirme su contraseña.";
                $_SESSION['error_confirmacion'] = $error_Confirmacion;
            }

            //Preparando datos previamente cargados para su retorno
            if ( isset($_POST['cajaNumControl']) && !empty($_POST['cajaNumControl']) ) {
                $_SESSION['usuario'] = $_POST['cajaNumControl'];
            }
            if ( isset($_POST['cajaContrasena']) && !empty($_POST['cajaContrasena']) ) {
                $_SESSION['contrasena'] = $_POST['cajaContrasena'];
            }
            if ( isset($_POST['confirmarCajaContrasena']) && !empty($_POST['confirmarCajaContrasena']) ) {
                $_SESSION['confirmacion'] = $_POST['confirmarCajaContrasena'];
            }

            var_dump($_SESSION);

            //Redirige para completar o corregir formulario de registro
            header("location:../Vistas/registro.php");
        }
        
    } else {
        if ( isset($_POST['cajaNumControl']) ) {
            $error_User = "Sin Usuario.";
            $_SESSION['error_usuario'] = $error_User;
        }
        if ( isset($_POST['cajaContrasena']) ) {
            $error_Password = "Sin contraseña.";
            $_SESSION['error_password'] = $error_Password;
        }
        if ( isset($_POST['confirmarCajaContrasena']) ) {
            $error_Confirmacion = "Confirme su contraseña.";
            $_SESSION['error_confirmacion'] = $error_Confirmacion;
        }

        //Preparando datos previamente cargados para su retorno
        if ( isset($_POST['cajaNumControl']) && !empty($_POST['cajaNumControl']) ) {
            $_SESSION['usuario'] = $_POST['cajaNumControl'];
        }
        if ( isset($_POST['cajaContrasena']) && !empty($_POST['cajaContrasena']) ) {
            $_SESSION['contrasena'] = $_POST['cajaContrasena'];
        }
        if ( isset($_POST['confirmarCajaContrasena']) && !empty($_POST['confirmarCajaContrasena']) ) {
            $_SESSION['confirmacion'] = $_POST['confirmarCajaContrasena'];
        }

        var_dump($_SESSION);

        //Redirige para completar o corregir formulario de registro
        header("location:../vista/registro/registro.html");
    }

    function limpiar_Cadena($cadena){
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        $cadena = htmlspecialchars($cadena);
    }

?>