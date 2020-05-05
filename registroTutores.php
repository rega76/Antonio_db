<!DOCTYPE html>
<html>
<head>
	<title>Registro Tutores</title>
	<meta charset="utf-8">
	<link rel=StyleSheet href="estilo.css" type="text/css">
</head>
<body>
	<?php 
	require_once 'Tutor.php';
	require_once "Tutor_Alumno.php";

		if(isset($_POST['registrar'])){
			
			$idAlumno= $_POST['idAlumno'];
			$dni= $_POST['dni'];
			$nombre= $_POST['nombre'];
			$apellidos= $_POST['apellidos'];
			$telefono= $_POST['telefono'];
			$direccion= $_POST['direccion'];
			$provincia= $_POST['provincia'];
			$municipio= $_POST['municipio'];
			$codPostal= $_POST['codPostal'];
			$estadoCivil= $_POST['estadoCivil'];
			require_once 'Tutor.php';
			require_once "Tutor_Alumno.php";

			$guardar=new Tutor($dni,$idAlumno,$nombre,$apellidos,$telefono,$direccion,$provincia,$municipio,$codPostal,$estadoCivil);
			$guardar->guardar(); 
	
			
			$guardar2=new TutorAlumno($dni,$idAlumno);
			$guardar2->guardar2();

		}elseif(isset($_POST['inicio'])){

			header ("location: index.php");

		}elseif(isset($_POST['modificar'])){

			Tutor::modificar($_POST['dni'],$_POST['nombre'],$_POST['apellidos'],$_POST['telefono'],$_POST['direccion'],$_POST['provincia'],$_POST['municipio'],$_POST['codPostal'],$_POST['estadoCivil']);

		}elseif(isset($_POST['eliminar'])){
			$dni= $_POST['dni'];
			
			Tutor::eliminar($_POST['dni']);
			
		}elseif(isset($_POST['buscar'])){
			 $idAlumno=$_POST['idAlumno'];
			 
			 require_once 'Tutor.php';
			 echo '<br>';
			 echo '<br>';
			 echo '<br>';
			 echo '<h2 style="color:#04F702;">Datos del/os tutor/es del Alumno con código: '.$idAlumno.'</h2><br>';
			 $tutor = Tutor::ver($idAlumno);		 
		}else{
	 ?>
	<form action="" method="POST">
		
		<table>
			<tr>
				<td colspan="5"><h1>Registro  de Tutores</h1><hr></td>
			</tr>
			</tr>
				<td><label>Id Alumno</label>
					</td>
				<td><input type="text" name="idAlumno" class="redondeado"></td>
			</tr>
			<tr>
				<td colspan="4"><h2>Datos del tutor</h2></td>
				
			</tr>
			<tr>
				<td><label>DNI</label><br>
					<input type="text" name="dni" class="redondeado"></td>
				<td><label>Nombre</label><br>
					<input type="text" name="nombre" class="redondeado"></td>
				<td><label>Apellidos</label><br>
					<input type="text" name="apellidos" class="redondeado"></td>
					<td><label>Telefono</label><br>
					<input type="text" name="telefono" class="redondeado"></td>
			</tr>
			<tr>
				<td><label>Direccion</label><br>
					<input type="text" name="direccion" class="redondeado"></td>
				<td><label>Provincia</label><br>
					<input type="text" name="provincia" class="redondeado"></td>
					<td><label>Municipio</label><br>
					<input type="text" name="municipio" class="redondeado"></td>
				<td><label>C.P</label><br>
					<input type="text" name="codPostal" class="redondeado"></td>
			</tr>
			<tr>
				
			</tr>
			<tr>
				<td><label>Estado Civil</label><br>
					
				<td colspan="4">
					<input type="radio" id="soltero" name="estadoCivil" value="soltero" class="radio">Soltero/a 
					<input type="radio" id="casado" name="estadoCivil" value="casado" class="radio">Casado/a 
					<input type="radio" id="separado" name="estadoCivil" value="separado" class="radio">Separado/a
				</td>

			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td><button name="registrar" class="lila">Registrar</button></td>
				<td><input type="reset" value="limpiar" class="lila"></input"></td>
				<td><button name="modificar" class="lila">Modificar</button></td>
				
			</tr>
			<tr>
				<td><button name="eliminar" class="lila">Eliminar</button></td>
				<td><button name="inicio" class="lila">Inicio</button></td>
				<td><input type="submit" name="buscar" value="Buscar" class="lila" class="redondeado"></td>
			</tr>
		</table>
	</form>
	<?php 
	}
	 ?>
</body>
</html>