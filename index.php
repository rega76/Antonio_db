
<!DOCTYPE html>
<html>
<head>
	<title>Pagina de inicio</title>
	<meta charset="utf-8">
	<link rel=StyleSheet href="estilo.css" type="text/css">
</head>

<body>
	<?php 
	require_once 'consultaGeneral.php';

	if (isset($_POST['registroAlumnos'])){
		header ('location:./registroAlumnos.php');
	}elseif (isset($_POST['registroTutores'])){
		header ('location:./registroTutores.php');
	}elseif (isset($_POST['intolerancias'])){
		header ('location:./registroIntolerancias.php');
	}elseif (isset($_POST['consultas'])){
		
		 $registro=consultaG::verTodos(0);

	}else{
 ?>
 	<div id="cuerpo">
	<form action="" method="post">
		
		<table>
			<tr>
				<td colspan="6"><h1>Comedor escolar CEIP La Campiña.</h1><hr></td>
			</tr>
			<tr>
				<td><input  type="submit" name="registroAlumnos" value="Registro Alumno" class="lila" class="redondeado"></td>
				<td><input type="submit" name="registroTutores" value="Registro Tutores"class="lila" class="redondeado"></td>
				<td><input type="submit" name="intolerancias" value="Registro intolerancias"class="lila" class="redondeado"></td>
				<td><input type="submit" name="consultas" value="Listado de Alumnos"class="lila" class="redondeado"></td>
			</tr>
		</table>
	</form>
	</div>
	<?php 
		}
	?>
</body>
</html>