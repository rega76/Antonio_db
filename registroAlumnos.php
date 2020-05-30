
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
	$idAlumno=(isset($_POST['idAlumno']))?$_POST['idAlumno']:'';
	$nombre=(isset($_POST['nombre']))?$_POST['nombre']:'';
	$apellidos= (isset($_POST['apellidos']))?$_POST['apellidos']:'';
	$edad=(isset($_POST['edad']))?$_POST['edad']:'';
	$curso=(isset($_POST['curso']))?$_POST['curso']:'';
	$transporteEscolar= (isset($_POST['transporteEscolar']))?$_POST['transporteEscolar']:'';
	
	//REGISTRO DE ALUMNOS 
		if(isset($_POST['registrar'])){
			$guardar=new Alumno($idAlumno,$nombre,$apellidos,$edad,$curso,$transporteEscolar);
			$guardar->guardar();
	//VOLVER A INDEX	
		}elseif(isset($_POST['inicio'])){
			header ("location: index.php");
	//MODIFICAR DATOS DE UN ALUMNO
		}elseif(isset($_POST['modificar'])){
		//Lo primero que hago es mostrar los datos del alumno al que quiero realizar los cambios
		//mediante el método verDatos, extrayendo los datos por el idAlumno.
		    $modif= Alumno::verDatos($idAlumno,$nombre,$apellidos,$edad,$curso,$transporteEscolar);
			?>
				<form action="" method="post">
				<table class="alumnoModificado">
					<tr>
						<th colspan="2"><h2>Modificar datos del Alumno</h2></th>
					</tr>
					
					<tr>
						<td ><input type="hidden" name="idAlumno" value="<?php echo $modif['idAlumno'] ?>"></td>
					</tr>
					<tr>
						<td><label for="">Nombre</label></td>
						<td><input type="text" name="nombre" value="<?php echo $modif['nombre'] ?>"></input><br></td>
					</tr>
					<tr>
						<td><label for="">Apellidos</label></td>
						<td><input type="text" name="apellidos" value="<?php echo $modif['apellidos'] ?>"></input><br></td>
					</tr>
					<tr>
						<td><label for="">Edad</label></td>
						<td><input type="text" name="edad" value="<?php echo $modif['edad'] ?>"></input><br></td>
					</tr>
					<tr>
						<td><label for="">Curso</label></td>
						<td><input type="text" name="curso" value="<?php echo $modif['curso'] ?>"></input><br></td>
					</tr>
					<tr>
						<td><label for="">Transporte Escolar</label></td>
						<td><input type="text" name="transporteEscolar" value="<?php echo $modif['transporteEscolar'] ?>"><br></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" name="modAlumno" value="Modificar alumno" class="lila"></input></td>
					</tr>
				</table>	
				</form>
			<?php
			
	//Una vez modificados los datos, realizo los cambios en la base de datos a través del 
	//método modificar.
				
		}elseif(isset($_POST['modAlumno'])){
			$modificar=new Alumno($idAlumno,$nombre,$apellidos,$edad,$curso,$transporteEscolar);
			$modificar->modificar($idAlumno,$nombre,$apellidos,$edad,$curso,$transporteEscolar);
			if($modificar){
				echo "<h2>Se han modificados los datos del alumnocon código ". $idAlumno."</h2>";
				printf ("<br><a href='registroAlumnos.php'><button class='lila'>Volver</button></a>");
			}else{
				echo "<h2>No se han podido modificar los datos". $idAlumno."</h2>";
				printf ("<br><a href='registroAlumnos.php'><button class='lila'>Volver</button></a>");
			}
	//ELIMINAR ALUMNO POR ID
		}elseif(isset($_POST['eliminar'])){
			$idAlumno=(isset($_POST['idAlumno']))?$_POST['idAlumno']:'';
			Alumno::eliminar($_POST['idAlumno']);
			if(!$idAlumno){
				echo "<h2>No se ha podido borrar el registro</h2>";
				printf ("<br><a href='registroAlumnos.php'><button class='lila'>Volver</button></a>");
				
			}else{
				echo "<h2>El registro se ha eliminado con eixto</h2>";
				printf ("<br><a href='registroAlumnos.php'><button class='lila'>Volver</button></a>");

			}
	//BUSCAR UN ALUMNO POR ID
		}elseif(isset($_POST['buscar'])){
			$idAlumno=(isset($_POST['idAlumno']))?$_POST['idAlumno']:'';

			 require_once 'Alumno.php';
			 $alumno = Alumno::ver($idAlumno);

	        ?><table class="alumnoModificado">
				<tr>
					<th colspan="6"><h2 style="color:white;">DATOS DEL ALUMNO/A.</h2><hr></th>
				</tr>
				<tr class="cabecera">
					<th>Id Alumno<hr></th>
					<th>Nombre<hr></th>
					<th>Apellidos<hr></th>
					<th>Edad<hr></th>
					<th>Curso<hr></th>
					<th>Transporte Escolar<hr></th>
				</tr>
			<?php
	        	if($alumno){
			?>	
				<tr>
					<td><?php  echo $alumno['idAlumno']; ?></td>
					<td><?php echo $alumno['nombre']; ?></td>
					<td><?php echo $alumno['apellidos']; ?></td>
					<td><?php echo $alumno['edad']; ?></td>
					<td><?php echo $alumno['curso']; ?></td>
					<td><?php echo $alumno['transporteEscolar']; ?></td>
				</tr>	
			<?php		    
			}
			?>
			</table>
			<a href="registroAlumnos.php"><button class='lila'>volver</button></a> 
			<?php
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
					<select name="edad"  class="redondeado" >
						<option value="" class="redondeado">
							<?php 
								for($edad=3; $edad<=12; $edad++){
									?><option value="<?php echo $edad ?>"><?php echo $edad ?></option> <?php
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
