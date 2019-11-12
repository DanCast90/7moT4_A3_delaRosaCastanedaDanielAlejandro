<?php

	if ( !session_status() ) {
		session_start();
	}
	include_once('../scripts_php/alumno_DAO.php');

	if ( isset($_GET) && !empty($_GET) ) {
        
		$aDAO = new AlumnoDAO();
		$DatosAlumno = $aDAO->consultaEspNumCont( $_GET['NumControl'] );
		$DatosAlumno = mysqli_fetch_object($DatosAlumno);
		$nc = $DatosAlumno->Num_Control;
		$n = $DatosAlumno->Nombre_Alumno;
		$pa = $DatosAlumno->Primer_Ap_Alumno;
		$sa = $DatosAlumno->Segundo_Ap_Alumno;
		$e = $DatosAlumno->edad;
		$s = $DatosAlumno->Semestre;
		$c = $DatosAlumno->Carrera;

    } else {
		echo "Error";
	}
	
	if ( isset($_SESSION['usuario']) ) {

		$nc = $_SESSION['usuario'];
		$n = $_SESSION['nombre'];
		$pa = $_SESSION['primerAp'];
		$sa = $_SESSION['segundoAP'];
		$e = $_SESSION['edad'];
		$s = $_SESSION['semestre'];
		$c = $_SESSION['carrera'];



	} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Modificaciones</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.75">
<link rel="stylesheet" href="../scripts_js/css/bootstrapAltas.css">
	<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">

</head>
<body>

	<?php 
        require_once('menu_principal.php');
    ?>

	<div class="container-contact100" >

		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="../scripts_php/procesar_Actualizacion.php" method="POST">

				

				<h1>&bull; Actualizar Alumno &bull;</h1>
					
				<div class="wrap-input100 bg1">
					<span class="label-input100">Numero de control: <?php if ( isset($_GET['NumControl']) && !empty($_GET['NumControl']) ) { echo $_GET['NumControl']; } ?></span>
					<input type="hidden" name="cajaNumControl" value="<?php if ( isset($_GET['NumControl']) && !empty($_GET['NumControl']) ) { echo $_GET['NumControl']; } ?>" aria-disabled="false">
					<span class="input100" style="color: red;"><?php if ( isset($_SESSION['error_usuario']) ) { echo $_SESSION['error_usuario'];  } ?></span>
				</div>

				<div class="wrap-input100 bg1">
					<span class="label-input100">Nombre competo *</span>
					<input class="input100" type="text" name="cajaNombre" placeholder="Introduzca su nombre" value="<?php if ( isset( $n ) && !empty( $n ) ) { echo $n; } ?>" require>
					<span class="input100" style="color: red;"><?php if ( isset($_SESSION['error_nombre']) ) { echo $_SESSION['error_nombre'];  } ?></span>
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Primer Ap *</span>
					<input class="input100" type="text" name="cajaPrimAp" placeholder="Inserta tu Primer Ap." value="<?php if ( isset( $pa ) && !empty( $pa ) ) { echo $pa; } ?>" require>
					<span class="input100" style="color: red;"><?php if ( isset($_SESSION['error_primerAP']) ) { echo $_SESSION['error_primerAP'];  } ?></span>					
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Segundo Ap *</span>
					<input class="input100" type="text" name="cajaSegAp" placeholder="Inserta tu Segundo Ap." value="<?php if ( isset( $sa ) && !empty( $sa ) ) { echo $sa; } ?>" require>
					<span class="input100" style="color: red;"><?php if ( isset($_SESSION['error_segAp']) ) { echo $_SESSION['error_segAp'];  } ?></span>
				</div>

				<div class="wrap-input100 bg1">
					<span class="label-input100">Edad *</span>
					<input class="input100" type="number" name="cajaEdad" placeholder="Introduzca su edad" value="<?php if ( isset( $e ) && !empty( $e ) ) { echo $e; } ?>" require>
					<span class="input100" style="color: red;"><?php if ( isset($_SESSION['error_edad']) ) { echo $_SESSION['error_edad'];  } ?></span>
				</div>

				<div class="wrap-input100 bg1">
					<span class="label-input100">Semestre *</span>
					<input class="input100" type="number" name="cajaSem" placeholder="Introduzca su edad" value="<?php if ( isset( $s ) && !empty( $s ) ) { echo $s; } ?>"  require >
					<span class="input100" style="color: red;"><?php if ( isset($_SESSION['cajaSem']) ) { echo $_SESSION['cajaSem'];  } ?></span>
				</div>

				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Carrera *</span>
					<div>
						<select class="js-select2" name="cajaCarr">
							<option><?php if ( isset( $c ) && !empty( $c ) ) { echo $c; } ?></option>
							<option>I.S.C.</option>
							<option>I.I.A.</option>
							<option>I.M.</option>
							<option>L.A.</option>
							<option>C.P.</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<span class="input100" style="color: red;"><?php if ( isset($_SESSION['error_carrera']) ) { echo $_SESSION['error_carrera'];  } ?></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Actualizar
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>