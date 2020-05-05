<!DOCTYPE html>
<html>
<head>
	<title>Intolerancias</title>
	<meta charset="utf-8">
	<link rel=StyleSheet href="estilo.css" type="text/css">
</head>
<body>
	<?php 
	require_once 'Intolerancia_Alumno.php';

		if(isset($_POST['volver'])){

			header ("location: ./index.php"); 

		}elseif(isset($_POST['limpiar'])){

			header ("location: ./registroIntolerancias.php"); 

		}elseif(isset($_POST['enviar'])){
			
			$idAlumno=$_POST['idAlumno'];

			$intolerancia=$_POST['intolerancia'];
			
			
			$guardarIntolerancia=new Intolerancia_Alumno($idAlumno,$intolerancia);
			$guardarIntolerancia->guardarIntolerancia(0,0);
			
		}elseif(isset($_POST['eliminar'])){
			
		

			$idAlumno=$_POST['idAlumno'];
			$intolerancia=$_POST['intolerancia'];

			$borrar= new Intolerancia_Alumno(0,0);
			$borrar->borrar($idAlumno,$intolerancia);

		}elseif (isset($_POST['buscar'])) {
			
			$idAlumno=$_POST['idAlumno'];
		 $int = Intolerancia_Alumno::ver($idAlumno);
		 
			 }else{
	
	 ?>
	 <form action="" method="post">
		<table>
			<tr>
				<td colspan="4"><h1>Registro de Intolerancias</h1><hr></td>
			</tr>
			<tr>
				<td><label>Id Alumno</label></td>
				<td><input type="text" name="idAlumno" class="redondeado"></td>
			</tr>
			<tr>
				<td><label><strong><p> Intolerancias</p></strong></label></td>	
			</tr>	
			<tr>
				<td colspan="3">
					
					<label><input type="checkbox" id="Gluten" value="Gluten" name="intolerancia" class="check">GLUTEN</label>
					
					<label><input type="checkbox" id="lacteos" value="Lacteos" name="intolerancia" class="check">LACTEOS</label>
					
					<label><input type="checkbox" id="huevo" value="Huevo" name="intolerancia" class="check">HUEVO</label>					
				</td>	
			</tr>
			<tr>
				<td colspan="3">
					
					<label><input type="checkbox" id="marisco" value="Marisco" name="intolerancia" class="check">MARISCO</label>
				
					<label><input type="checkbox" id="moluscos" value="Moluscos" name="intolerancia" class="check">MOLUSCOS</label>
					
					<label><input type="checkbox" id="crustaceos" value="Crustaceos" name="intolerancia" class="check">CRUSTACEOS</label>					
				</td>
			<tr>
				<td colspan="3">
					
					<label><input type="checkbox" id="cacahuete" value="Cacahuete" name="intolerancia" class="check">CACAHUETE</label>
					
					<label><input type="checkbox" id="soja" value="Soja" name="intolerancia" class="check">SOJA</label>
					
					<label><input type="checkbox" id="pescado" value="Pescado" name="intolerancia" class="check">PESCADO</label>					
				</td>
			<tr>
				<td colspan="3">
					
					<label><input type="checkbox" id="sesamo" value="Sesamo" name="intolerancia" class="check">SESAMO</label>
					
					<label><input type="checkbox" id="apio" value="Apio" name="intolerancia" class="check">APIO</label>
					
					<label><input type="checkbox" id="sulfitos" value="Sulfitos" name="intolerancia" class="check">SULFITOS</label>	
				</td>	
			</tr>
			
			<tr>
				<td colspan="3">
					<label><input type="checkbox" id="FrutosSecos" value="frutosSecos" name="intolerancia" class="check">FRUTOS SECOS</label>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="enviar" value="Enviar" class="lila"></td>
				<td><input type="submit" name="limpiar" value="Limpiar" class="lila"></td>
				<td><input type="submit" name="eliminar" value="Eliminar" class="lila"></td>
				
			</tr>
			<tr>
				<td><input type="submit" name="volver" value="Inicio" class="lila"></td>
				<td><input type="submit" name="buscar" value="Buscar" class="lila" class="redondeado"></td>
			</tr>
		</table>
	</form>
	<?php 
	}
	 ?>
</body>
</html>