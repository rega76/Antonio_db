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
	$idAlumno= (isset($_POST['idAlumno']))?$_POST['idAlumno']:'';
	$dni= (isset($_POST['dni']))?$_POST['dni']:'';
	$nombre= (isset($_POST['nombre']))?$_POST['nombre']:'';
	$apellidos= (isset($_POST['apellidos']))?$_POST['apellidos']:'';
	$telefono= (isset($_POST['telefono']))?$_POST['telefono']:'';
	$direccion= (isset($_POST['direccion']))?$_POST['direccion']:'';
	$provincia= (isset($_POST['provincia']))?$_POST['provincia']:'';
	$municipio= (isset($_POST['municipio']))?$_POST['municipio']:'';
	$codPostal= (isset($_POST['codPostal']))?$_POST['codPostal']:'';
	$estadoCivil= (isset($_POST['estadoCivil']))?$_POST['estadoCivil']:'';
	
		if(isset($_POST['registrar'])){
			
/*			$idAlumno= $_POST['idAlumno'];
			$dni= $_POST['dni'];
			$nombre= $_POST['nombre'];
			$apellidos= $_POST['apellidos'];
			$telefono= $_POST['telefono'];
			$direccion= $_POST['direccion'];
			$provincia= $_POST['provincia'];
			$municipio= $_POST['municipio'];
			$codPostal= $_POST['codPostal'];
			$estadoCivil= $_POST['estadoCivil'];
*/			
			require_once 'Tutor.php';
			require_once "Tutor_Alumno.php";

			$guardar=new Tutor($dni,$idAlumno,$nombre,$apellidos,$telefono,$direccion,$provincia,$municipio,$codPostal,$estadoCivil);
			$guardar->guardar(); 
			
			$guardar2=new TutorAlumno($dni,$idAlumno);
			$guardar2->guardar2();
			if($guardar == TRUE && $guardar2 == TRUE){

				printf ('<h2 style="color:white;"> El registro se ha realizado con exito.<h2>');
				printf ("<br><a href='registroTutores.php'><button class='lila'>volver</button></a>");
			}else{
				printf ('<h2 style="color:white;"> El registro con dni: '.$this->dni.' ya existe.<h2>');
				printf ("<br><a href='registroTutores.php'><button class='lila'>volver</button></a>");
			}
		}elseif(isset($_POST['inicio'])){

			header ("location: index.php");

		}elseif(isset($_POST['modificar'])){
			 $dni=$_POST['dni'];
			 require_once 'Tutor.php';
			 $tutor=Tutor::ver($dni);
			 ?>
			 <form action="" method="post">
	         	<table class="lista">
					 <tr>
						 <th colspan="12"><h2 style="color:white;">Datos del/os tutor/es del Alumno con código <?php echo $idAlumno ?> </h2><hr></th>
					 </tr>
		 			<tr class="cabecera">
						 <th>DNI<hr></th>
						<th>Id Alumno<hr></th>
		 				<th>Nombre<hr></th>
		 				<th>Apellidos<hr></th>
		 				<th>Telefono<hr></th>
		 				<th>Direcccion<hr></th>
		 				<th>Provincia<hr></th>	
		 				<th>Municipio<hr></th>
		 				<th>C.P<hr></th>
						 <th>Estado Civil<hr></th>
						 <th colspan="2">ACCIONES <hr></th>
					 </tr>	
	       		 	<tr>
						<td><input type="text" name="dni" value="<?php echo $tutor['dni']; ?>" style="width : 80px;"><hr></td>
						<td><input type="text" name="idAlumno" value="<?php echo $tutor['idAlumno']; ?>" style="width : 80px;"><hr></td>
		 				<td><input type="text" name="nombre" value="<?php echo $tutor['nombre']; ?>"style="width : 80px;"><hr></td>
		 				<td><input type="text" name="apellidos" value="<?php echo $tutor['apellidos']; ?>"style="width : 80px;"><hr></td>
		 				<td><input type="text" name="telefono" value="<?php echo $tutor['telefono']; ?>"style="width : 80px; "><hr></td>
		 				<td><input type="text" name="direccion" value="<?php echo $tutor['direccion']; ?>"style="width : 80px;"><hr></td>
		 				<td><input type="text" name="provincia" value="<?php echo $tutor['provincia']; ?>"style="width : 80px;"><hr></td>
		 				<td><input type="text" name="municipio" value="<?php echo $tutor['municipio']; ?>"style="width : 80px;"><hr></td>
		 				<td><input type="text" name="codPostal" value="<?php echo $tutor['codPostal']; ?>"style="width : 80px;"><hr></td>
						<td><input type="text" name="estadoCivil" value="<?php echo $tutor['estadoCivil']; ?>"style="width : 80px;"><hr></td>
						<td><input type="submit" name="modificarTutor" value="Modificar" class="acciones"><hr></td>
						<td><input type="submit" name="eliminar" value="Eliminar" class="acciones"><hr></td>
					</tr>	 		
				 </table>
				 </form>
				  <?php
				printf ("<br/><a href='registroTutores.php'><button class='lila'>Volver</button></a>"); 
				
		}elseif(isset($_POST['modificarTutor'])){	

		$modificar=new Tutor($dni,$idAlumno,$nombre,$apellidos,$telefono,$direccion,$provincia,$municipio,$codPostal,$estadoCivil);
		$modificar->modificar($dni,$idAlumno,$nombre,$apellidos,$telefono,$direccion,$provincia,$municipio,$codPostal,$estadoCivil);
			if($modificar){
				echo "<h2>Registro modificado con exito.</h2>";
				printf ("<br><a href='registroTutores.php'><button class='lila'>Volver</button></a>");
			}

		}elseif(isset($_POST['eliminar'])){
			
			$dni= $_POST['dni'];
			$eliminar=Tutor::eliminar($dni);
			
			$eliminar=TutorAlumno::eliminar2($dni);

		}elseif(isset($_POST['buscar'])){
			
			$tutores=Tutor::verTodos($dni);
			?>
			 <form action="" method="post">
	         	<table class="lista">
					 <tr>
						 <th colspan="12"><h2 style="color:white;">Datos del/os tutor/es del Alumno con código <?php echo $idAlumno ?> </h2><hr></th>
					 </tr>
		 			<tr class="cabecera">
						 <th>DNI<hr></th>
						<th>Id Alumno<hr></th>
		 				<th>Nombre<hr></th>
		 				<th>Apellidos<hr></th>
		 				<th>Telefono<hr></th>
		 				<th>Direcccion<hr></th>
		 				<th>Provincia<hr></th>	
		 				<th>Municipio<hr></th>
		 				<th>C.P<hr></th>
						 <th>Estado Civil<hr></th>
					 </tr>	
					 <?php foreach($tutores as $tutor){ ?>
	       		 	<tr>
						<td><?php echo $tutor['dni']; ?><hr></td>
						<td><?php echo $tutor['idAlumno']; ?><hr></td>
		 				<td><?php echo $tutor['nombre']; ?><hr></td>
		 				<td><?php echo $tutor['apellidos']; ?><hr></td>
		 				<td><?php echo $tutor['telefono']; ?><hr></td>
		 				<td><?php echo $tutor['direccion']; ?><hr></td>
		 				<td><?php echo $tutor['provincia']; ?><hr></td>
		 				<td><?php echo $tutor['municipio']; ?><hr></td>
		 				<td><?php echo $tutor['codPostal']; ?><hr></td>
						<td><?php echo $tutor['estadoCivil']; ?><hr></td>
					</tr>
					<?php } ?>	 		
				 </table>
				 </form>
				  <?php
				printf ("<br/><a href='registroTutores.php'><button class='lila'>Volver</button></a>"); 
			
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
					<input type="radio" id="soltero" name="estadoCivil" value="soltero/a" class="radio">Soltero/a 
					<input type="radio" id="casado" name="estadoCivil" value="casado/a" class="radio">Casado/a 
					<input type="radio" id="separado" name="estadoCivil" value="separado/a" class="radio">Separado/a
				</td>

			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td><button name="registrar" class="regTutor">Registrar</button></td>
				<td><input type="reset" value="Limpiar" class="regTutor"></input"></td>
				<td><button name="modificar" class="regTutor">Modificar/Eliminar</button></td>
				
			</tr>
			<tr>
				
				<td><button name="inicio" class="regTutor">Inicio</button></td>
				<td><input type="submit" name="buscar" value="Listar Tutores" class="regTutor" class="redondeado"></td>
			</tr>
		</table>
	</form>
	<?php 
	}
	 ?>
</body>
</html>