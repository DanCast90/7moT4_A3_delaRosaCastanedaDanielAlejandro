<h3 style="border-bottom: 2px solid black">FORMA 1</h3>
		<br><br>
		<table class="table" style="width: 75%;margin: 0 auto">
			<caption><h1>Alumnos</h1></caption>
			<thead class="thead-dark">
				<tr>
					<th scope="col">Numero de control</th>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido Paterno</th>
					<th scope="col">Apellido Materno</th>
					<th scope="col">Edad</th>
					<th scope="col">Semestre</th>
					<th scope="col">Carrera</th>
					<th scope="col">Accion</th>
				</tr>

				<?php	
				
				$obj=new ConexionBD;
				$conexion=$obj->getConection();
				$sql="SELECT * FROM ALUMNOS";
				$res=mysqli_query($conexion,$sql);
				if(mysqli_num_rows($res)>0){
					while ($fila=mysqli_fetch_assoc($res)) {
						printf("<tr><td>".$fila['Num_Control']."</td>".
						"<td>".$fila['Nombre_Alumno']."</td>".
						"<td>".$fila['Primer_Ap_Alumno']."</td>".
						"<td>".$fila['Segundo_Ap_Alumno']."</td>".
						"<td>".$fila['edad']."</td>".
						"<td>".$fila['Semestre']."</td>".
						"<td>".$fila['Carrera']."</td>".
						"<td><a href='../scripts_php/procesar_baja.php?nc=%s'>ELIMINAR</a></td></tr>",$fila['Num_Control']);	
					}
				}
				?>
			</thead>
			<tbody>
			</tbody>
		</table>



		<!-- 
			AQUI VA MAS CODIGIO ALV CERO MIEDO ALV ALV
		
		
		<tbody>
			<?php
		//	$aDAO=new AlumnoDAO();
		//	$listaAlumnos=$aDAO->mostrarTodos();
			//	while ($fila=mysqli_fetch_object($listaAlumnos)) {
				//	$nc=$fila->Num_Control;
				//	$nom=$fila->Nombre_Alumno;
				//	$app=$fila->Primer_Ap_Alumno;
				//	$apm=$fila->Segundo_Ap_Alumno;
				//	$edad=$fila->edad;
				//	$semestre=$fila->Semestre;
				//	$carrera=$fila->Carrera;
				
			?>
			<tr>
				<td><?php //echo $nc; ?></td>
				<td><?php// echo $nom; ?></td>
				<td><?php ///echo $app; ?></td>
				<td><?php //echo $apm; ?></td>
				<td><?php //echo $edad; ?></td>
				<td><?php// echo $semestre; ?></td>
				<td><?php //echo $carrera; ?></td>

				<td style="text-align:center;">
					<a href='../scripts_php/procesar_baja.php?nc=<?php //echo $nc;?>'>
						<i class="fa fa-trash" style="font-size: 30px; color: orange;"></i>
					</a>
				</td>
			</tr>
			<?php
	//	}
		?>
			
		</tbody>
		-->