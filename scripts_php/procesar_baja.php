<?php

	include("alumno_DAO.php");
	
	
	if(isset($_GET) && !empty($_GET)){
		$alumnoDAO=new AlumnoDAO();
		$alumnoDAO->eliminar($_GET['nc']);
	}else{
		echo "Datos Faltantes";
	}


?>