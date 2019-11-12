<?php
  
  session_start();

  if ( $_SESSION['valido'] == false ) {
    header("location:Login_vF/login.php");
  }

    include_once('../Scripts_php/alumno_dao.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SISTEMA ABCC</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Sistema ABCC</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="menu_principal.php">Inicio</a></li>
      <li><a href="altas1.php">Altas</a>
       <!-- <ul class="dropdown-menu">
          
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
     	 
        </ul>-->
      </li>
      <li><a href="bajas.php">Bajas/Cambios</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <!--  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="../scripts_php/cerrar_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
 
  <div class="container">
        <form action="../Scripts_php/procesar_ConsultaE.php" method="POST">
            <h1 class="page-header" style="text-align: center;">ALUMNOS REGISTRADOS</h1>
            <h3 class="padding-left">Encontrar con:</h3>
            <input class="form-control fa fa-search" type="text" name="buscarA" placeholder="A Buscar">
            <span><br></span>
            <input class="btn btn-primary form-control" type="submit" value="Buscar" >
                
            </i>
        </form>
    </div>

    

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>ALUMNOS</b></h2></div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Numero de Control</th>
                        <th>Nombre(s)</th>
                        <th>Primer Ap.</th>
                        <th>Segundo Ap.</th>
                        <th>Edad</th>
                        <th>Semestre</th>
                        <th>Carrera</th>
                    </tr>
                </thead>
                 
                <tbody>    
                        <?php

                            $aDAO = new AlumnoDAO();
                            
                            if ( isset( $_SESSION['espesifica'] ) ) {
                                $listaAlumnos = $aDAO->consultaEspesifica( $_SESSION['espesifica'] );
                            } else {
                              $listaAlumnos = $aDAO->mostrarTodos();
                            }

              while ($fila=mysqli_fetch_object($listaAlumnos)){
                  $nc = $fila->Num_Control;
                  $n = $fila->Nombre_Alumno;
                  $pa = $fila->Primer_Ap_Alumno;
                  $sa = $fila->Segundo_Ap_Alumno;
                  $e = $fila->edad;
                  $s = $fila->Semestre;
                  $c = $fila->Carrera;
                ?>
                <tr>
                  <td><?php echo $nc;?></td>
                  <td><?php echo $n;?></td>
                  <td><?php echo $pa;?></td>
                  <td><?php echo $sa;?></td>
                  <td><?php echo $e;?></td>
                  <td><?php echo $s;?></td>
                  <td><?php echo $c;?></td>
                  
                </tr> 
                <?php
              }
                ?>  
                </tbody>
            </table>

        </div>
    </div>

</body>
</html>
