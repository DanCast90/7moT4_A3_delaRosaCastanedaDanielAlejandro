<!DOCTYPE html>
<html>
<head>
	<title>Altas</title>
</head>
<body>

		<?php
		
		require_once('menu_principal.html');

		?>

		<h1>Altas Alumnos</h1>
		<br>	
		<form method="POST" action="../scripts_php/procesar_alta.php">
			
		<label>Numero de control: </label>
		<input type="text" name="numcontrol" value="">
		<br>
		<label>Nombre: </label>
		<input type="text" name="nombre" value="">
		<br>
		<label>Primer Apellido: </label>
		<input type="text" name="app" value="">
		<br>
		<label>Segundo apellido: </label>
		<input type="text" name="apm" value="">
		<br>
		<label>Edad: </label>
		<input type="text" name="edad" value="">
		<br>
		<label>Semestre: </label>
		<input type="text" name="semestre" value="">
		<br>
		<label>Carrera: </label>
		<input type="text" name="carrera" value="">
		<br>
		<input type="submit" name="" value="Guardar">
		</form>







</body>
</html>