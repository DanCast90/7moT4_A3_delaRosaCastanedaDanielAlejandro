<!DOCTYPE html>
<html lang="en">
<head>
	<title>ALTAS</title>
	<link rel="stylesheet" href="../scripts_js/css/bootstrapAltas.css">

</head>
<body>
	<?php
		
		require_once('menu_principal.php');

		?>

<div id="container" style="width: auto;height: auto;">
  <h1>&bull; Altas Alumnos &bull;</h1>
  <div class="underline">
  
  </div>
  
  <form  method="post" id="contact_form" action="../scripts_php/procesar_alta.php">
  	 <div>
      <label for="name"></label>
      <input type="text" placeholder="Numero de control" name="numcontrol" required>
    </div>
    <div>
      <label for="name"></label>
      <input type="text" placeholder="Nombre" name="nombre"  required>
    </div>
    <div class="name">
      <label for="name"></label>
      <input type="text" placeholder="Apellido P." name="app"  required>
    </div>
    <div class="email">
      <label for="email"></label>
      <input type="text" placeholder="Apellido M." name="apm" id="email_input" required>
    </div>
   
    <div>
      <label for="subject"></label>
     <input type="number" name="edad"max="100" min="1" placeholder="edad" required >
    </div>
    <div>
      <label for="subject"></label>
      <select placeholder="Semestre" name="semestre" required>
        <option disabled hidden selected>SEMESTRE</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
      	<option>4</option>
      	<option>5</option>
      	<option>6</option>
      	<option>7</option>
       	<option>8</option>
       	<option>9</option>
       	<option>10</option>
      </select>
    </div>
    <div>
      <label for="subject"></label>
      <select placeholder="carrera" name="carrera" required>
        <option disabled hidden selected>CARRERA</option>
        <option>ISC</option>
        <option>IIA</option>
        <option>IM</option>
      	<option>LA</option>
      	<option>CP</option>
      </select>
    </div>
    <br><br>
    <div class="submit">
      <input type="submit" value="Dar Alta" id="form_button" />
    </div>
  </form><!-- // End form -->
</div><!-- // End #container -->

</body>
</html>