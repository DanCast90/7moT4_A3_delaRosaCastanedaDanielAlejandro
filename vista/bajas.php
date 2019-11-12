<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		require_once('menu_principal.php');
		
		include_once("../scripts_php/alumno_DAO.php");
		?>
	<meta charset="utf-8">
	<title>Bajas</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
		
		

		<!-- MIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU-->

		<br><br>
		<h1 style="text-align: center;">BAJAS ALUMNOS</h1>
		<br><br>
		


	<div class="container">
        <div class="table-responsive">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>ALUMNOS</b></h2></div>
                    <div class="col-sm-4">
                        <a href="altas1.php" class="btn btn-info add-new">
                        	<i class="fa fa-plus"></i> 
                        	Agregar ALUMNO
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped" style="width: 85%;margin: 0 auto">
                <thead class="thead-dark">
                    <tr>
                        <th >Numero de Control</th>
                        <th >Nombre(s)</th>
                        <th >Primer Ap.</th>
						<th >Segundo Ap.</th>
                        <th >Edad</th>
                        <th >Semestre</th>
                        <th >Carrera</th>
                        <th >REALIZAR</th>
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
									
									<td style="text-align: center;">

										<a href="formulario_actualizar.php?NumControl=<?php echo $nc;?>" class="edit" title="Edición" data-toggle="tooltip">
											<!-- <i class="material-icons">&#xE254;</i> -->


<i class="fa fa-pencil" style="font-size:30px;color:orange;"></i>

										</a>
										<a href="../scripts_php/procesar_baja.php?nc=<?php echo $nc;?>" class="delete" title="Eliminación" data-toggle="tooltip">
											<!-- <i class="material-icons">&#xE872;</i> -->

<i class="fa fa-trash" style="font-size:30px;color:red; padding-left: 30px;"></i>											
										</a>
									</td>
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