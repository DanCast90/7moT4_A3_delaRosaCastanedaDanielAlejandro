<?php

    session_start();

    include_once("alumno_dao.php");

    $error_User = "";
    $error_Password = "";
    $error_Confirmacion = ""; 
    $error_Registro = "";

   

    // ================================================ Valida la existencia de la variable ================================================
    if ( isset($_POST['cajaNumControl']) && isset($_POST['cajaNombre']) && isset($_POST['cajaPrimAp']) && isset($_POST['cajaSegAp']) && isset($_POST['cajaEdad']) && isset($_POST['cajaSem']) && isset($_POST['cajaCarr']) ) {
        // ================================================ Valida que no este vasia la variable ================================================
        if ( !empty($_POST['cajaNumControl']) && !empty($_POST['cajaNombre']) && !empty($_POST['cajaPrimAp']) && !empty($_POST['cajaSegAp']) && !empty($_POST['cajaEdad']) && !empty($_POST['cajaSem']) && !empty($_POST['cajaCarr']) ) {
            // ================================================ Realiza actualizacion del alumno ================================================
            
            $numC = $_POST['cajaNumControl'];
            $name = $_POST['cajaNombre'];
            $fAp = $_POST['cajaPrimAp'];
            $sAp = $_POST['cajaSegAp'];
            $age = $_POST['cajaEdad'];
            $sem = $_POST['cajaSem'];
            $car = $_POST['cajaCarr'];
            
            $aDAO = new AlumnoDAO();
            echo "A modificar";
            $aDAO->modificar($numC, $name, $fAp, $sAp, $age, $sem, $car);

        } else {
                
            if ( empty($_POST['cajaNumControl']) ) {
                $_SESSION['error_usuario'] = "Sin Usuario.";
            }
            if ( empty($_POST['cajaNombre']) ) {
                $_SESSION['error_nombre'] = "Sin Nombre del alumno.";
            }
            if ( empty($_POST['cajaPrimAp']) ) {
                $_SESSION['error_primerAP'] = "Sin primer apeido.";
            }
            if ( empty($_POST['cajaSegAp']) ) {
                $_SESSION['error_segAp'] = "Sin segundo apeido.";
            }
            if ( empty($_POST['cajaEdad']) ) {
                $_SESSION['error_edad'] = "Sin edad.";
            }
            if ( empty($_POST['cajaSem']) ) {
                $_SESSION['error_semestre'] = "Sin edad del alumno.";
            }
            if ( empty($_POST['cajaCarr']) ) {
                $_SESSION['error_carrera'] = "Seleccione la carrera del alumno.";
            }


            //Preparando datos previamente cargados para su retorno
            if ( isset($_POST['cajaNumControl']) && !empty($_POST['cajaNumControl']) ) {
                $_SESSION['usuario'] = $_POST['cajaNumControl'];
            }
            if ( isset($_POST['cajaNombre']) && !empty($_POST['cajaNombre']) ) {
                $_SESSION['nombre'] = $_POST['cajaNombre'];
            }
            if ( isset($_POST['cajaPrimAp']) && !empty($_POST['cajaPrimAp']) ) {
                $_SESSION['primerAp'] = $_POST['cajaPrimAp'];
            }
            if ( isset($_POST['cajaSegAp']) && !empty($_POST['cajaSegAp']) ) {
                $_SESSION['segundoAP'] = $_POST['cajaSegAp'];
            }
            if ( isset($_POST['cajaEdad']) && !empty($_POST['cajaEdad']) ) {
                $_SESSION['edad'] = $_POST['cajaEdad'];
            }
            if ( isset($_POST['cajaSem']) && !empty($_POST['cajaSem']) ) {
                $_SESSION['semestre'] = $_POST['cajaSem'];
            }
            if ( isset($_POST['cajaCarr']) && !empty($_POST['cajaCarr']) ) {
                $_SESSION['carrera'] = $_POST['cajaCarr'];
            }

            var_dump($_SESSION);

            //Redirige para completar o corregir formulario de registro
            header("location:../vista/Formulario_actualizar.php");

        }
    } else {
        
        if ( isset($_POST['cajaNumControl']) ) {
            $_SESSION['error_usuario'] = "Sin Usuario.";
        }
        if ( isset($_POST['cajaNombre']) ) {
            $_SESSION['error_nombre'] = "Sin Nombre del alumno.";
        }
        if ( isset($_POST['cajaPrimAp']) ) {
            $_SESSION['error_primerAP'] = "Sin primer apeido.";
        }
        if ( isset($_POST['cajaSegAp']) ) {
            $_SESSION['error_segAp'] = "Sin segundo apeido.";
        }
        if ( isset($_POST['cajaEdad']) ) {
            $_SESSION['error_edad'] = "Sin edad.";
        }
        if ( isset($_POST['cajaSem']) ) {
            $_SESSION['error_semestre'] = "Sin edad del alumno.";
        }
        if ( isset($_POST['cajaCarr']) ) {
            $_SESSION['error_carrera'] = "Seleccione la carrera del alumno.";
        }


        //Preparando datos previamente cargados para su retorno
        if ( isset($_POST['cajaNumControl']) && !empty($_POST['cajaNumControl']) ) {
            $_SESSION['usuario'] = $_POST['cajaNumControl'];
        }
        if ( isset($_POST['cajaNombre']) && !empty($_POST['cajaNombre']) ) {
            $_SESSION['nombre'] = $_POST['cajaNombre'];
        }
        if ( isset($_POST['cajaPrimAp']) && !empty($_POST['cajaPrimAp']) ) {
            $_SESSION['primerAp'] = $_POST['cajaPrimAp'];
        }
        if ( isset($_POST['cajaSegAp']) && !empty($_POST['cajaSegAp']) ) {
            $_SESSION['segundoAP'] = $_POST['cajaSegAp'];
        }
        if ( isset($_POST['cajaEdad']) && !empty($_POST['cajaEdad']) ) {
            $_SESSION['edad'] = $_POST['cajaEdad'];
        }
        if ( isset($_POST['cajaSem']) && !empty($_POST['cajaSem']) ) {
            $_SESSION['semestre'] = $_POST['cajaSem'];
        }
        if ( isset($_POST['cajaCarr']) && !empty($_POST['cajaCarr']) ) {
            $_SESSION['carrera'] = $_POST['cajaCarr'];
        }

        var_dump($_SESSION);

        //Redirige para completar o corregir formulario de registro
        header("location:../vista/formulario_actualizar.php");

    }
    

?>