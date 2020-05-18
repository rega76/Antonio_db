
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
	}elseif (isset($_POST['listaAlumnos'])){

		require_once 'consultaGeneral.php';
		 $registro=consultaG::verTodos();

		 ?>
		 <br>
			   <table class="lista" >
				   <tr>
					   <th colspan="6"><h2 style='color:white;'>LISTADO DE ALUMNOS </h2><hr></th>
				   </tr>
			   
				   <tr class="cabecera">
					   <th>ID ALUMNO<hr></th>
					   <th>NOMBRE<hr></th>
					   <th>APELLIDOS<hr></th>
					   <th>EDAD<hr></th>
					   <th>CURSO<hr></th>
					   <th>TRANSPORTE ESCOLAR<hr></th>
					   
				   </tr>
		  			<?php foreach($registro as $reg){?>
				   <tr>
					   <td ><?php echo $reg['idAlumno']; ?><hr></td>
					   <td><?php echo $reg['nombre']; ?><hr></td>
					   <td><?php echo $reg['apellidos']; ?><hr></td>
					   <td><?php echo $reg['edad']; ?><hr></td>
					   <td><?php echo $reg['curso']; ?><hr></td>
					   <td><?php echo $reg['transporteEscolar']; ?><hr></td>
				   </tr>
					  <?php }?>
			   </table>
			   
			   <a href="index.php"><button class='lila'>volver</button></a>
		   <?php
		   
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
				<td><input type="submit" name="listaAlumnos" value="Listado de Alumnos"class="lila" class="redondeado"></td>
			</tr>
		</table>
	</form>
	</div>
	<?php 
		}
	?>
</body>
</html>