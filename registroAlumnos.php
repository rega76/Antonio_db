
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRO DE ALUMNOS</title>
	<meta charset="utf-8">
	<link rel=StyleSheet href="estilo.css" type="text/css">
</head>
<body>
	<?php 
	
	require_once 'Alumno.php';

		if(isset($_POST['registrar'])){
		
			$idAlumno= $_POST['idAlumno'];
			$nombre= $_POST['nombre'];
			$apellidos= $_POST['apellidos'];
			$edad= $_POST['edad'];
			$curso= $_POST['curso'];
			$transporteEscolar= $_POST['transporteEscolar'];

			
			$guardar=new Alumno($idAlumno,$nombre,$apellidos,$edad,$curso,$transporteEscolar);
			$guardar->guardar();

			
			
		}elseif(isset($_POST['inicio'])){

			header ("location: index.php");

		}elseif(isset($_POST['modificar'])){
			
			$idAlumno= $_POST['idAlumno'];
			$nombre= $_POST['nombre'];
			$apellidos= $_POST['apellidos'];
			$edad= $_POST['edad'];
			$curso= $_POST['curso'];
			$transporteEscolar= $_POST['transporteEscolar'];

			Alumno::modificar($_POST['idAlumno'],$_POST['nombre'],$_POST['apellidos'],$_POST['edad'],$_POST['curso'],$_POST['transporteEscolar']);
	

		}elseif(isset($_POST['eliminar'])){
			$idAlumno= $_POST['idAlumno'];
			

			Alumno::eliminar($_POST['idAlumno']);
			

		}elseif(isset($_POST['buscar'])){
			 $idAlumno=$_POST['idAlumno'];

			 require_once 'Alumno.php';
			 $alumno = Alumno::ver($idAlumno);

		}else{

	 ?>

	<form action="" method="post">
		<table>
			<tr>
				<td colspan="6"><h1>Registro de alumnos</h1><hr>
				</td>

			</tr>
			<tr>
				<td colspan="2"><label>Id Alumno</label></td>
				<td colspan="2"><input type="text" name="idAlumno" class="redondeado"></td>
			</tr>
			<tr>
				<td colspan="2"><label>Nombre</label></td>
				<td colspan="2"><input type="text" name="nombre" class="redondeado"></td>
			</tr>
			<tr>
				<td colspan="2"><label>Apellidos</label></td>
				<td colspan="2"><input type="text" name="apellidos" class="redondeado"></td>
			</tr>
			<tr>
				<td colspan="2"><label>Edad</label></td>
				<td colspan="2">
					<select name="edad" class="redondeado">
						<option value="" class="redondeado">
							<?php 
								for($e=3; $e<=12; $e++){
									?><option value="<?php echo $e ?>"><?php echo $e ?></option> <?php
								}
							 ?>
						</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><label>Curso</label></td>
				<td colspan="2"><input type="text" name="curso" class="redondeado"></td>
			</tr>
			<tr>
				<td colspan="2"><label>Transporte Escolar</label></td>
				<td colspan="2">
					<input type="radio" id="Si" name="transporteEscolar" value="Si" class="redondeado">Si
					<input type="radio" id="No" name="transporteEscolar" value="No" class="redondeado">No
					<!--<input type="hidden" name="transporteEscolar" value="insert">-->
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="registrar" value="Registrar" class="lila" class="redondeado"></input></td>
				<td><input type="reset"  value="Limpiar" class="lila" class="redondeado"></input></td>
				<td><input type="submit" name="modificar" value="Modificar" class="lila" class="redondeado"></input></td>
				<td><input type="submit" name="eliminar" value="Eliminiar" class="lila" class="redondeado"></input></td>
				<td><input type="submit" name="inicio" value="Inicio" class="lila" class="redondeado"></input></td>
				<td><input type="submit" name="buscar" value="Buscar" class="lila" class="redondeado"></td>
			</tr>
		</table>		
	</form>
<?php 
	}
 ?>

 
</body>
</html>
