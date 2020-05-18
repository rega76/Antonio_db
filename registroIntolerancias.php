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
		
			foreach($intolerancia as $intolerancia){
				$guardarIntolerancia=new Intolerancia_Alumno($idAlumno,$intolerancia);
				$guardarIntolerancia->guardarIntolerancia($idAlumno,$intolerancia);

			}  

			if(!$idAlumno){
				echo "<h2>No se ha podido realizar el registro</h2>";
				printf ("<br><a href='registroIntolerancias.php'><button class='lila'>volver</button></a>");
				
			}else{
				echo  '<h2>Se ha guardado correctamente</h2>';
			printf ("<br><a href='registroIntolerancias.php'><button class='lila'>volver</button></a>");

			}	
			
			
		}elseif (isset($_POST['buscar'])) {
			
			$idAlumno=$_POST['idAlumno'];
			$int = Intolerancia_Alumno::ver($idAlumno);
			
			?>
			<table class="lista">
				<tr>
					<th>INTOLERANCIAS DEL ALUMNO CON CODIGO:<?php echo $idAlumno ?> <hr></th>
					<th>ID INTOLERANCIA <hr></th>
				</tr>
				<?php foreach ($int as $into): ?>
				<tr>
					<td><?php echo $into['intolerancia']; ?><hr></td>
					<td><?php echo $into['codIntolerancia'] ?><hr></td>
				</tr>
				<?php endforeach;?>
			</table>
			<a href="registroIntolerancias.php"><button class='lila'>volver</button></a> 
			<?php	
		}elseif(isset($_POST['eliminar'])){
			$idAlumno=(isset($_POST['idAlumno']))? $_POST['idAlumno']:'';
			$intolerancia=(isset($_POST['intolerancia']))? $_POST['intolerancia']:'';
			
			foreach($intolerancia as $intolerancia){
				$eliminarIntolerancia=new Intolerancia_Alumno($idAlumno,$intolerancia);
				$eliminarIntolerancia->eliminar($idAlumno,$intolerancia);	
			}if($eliminarIntolerancia == true){
				echo "<h2>Se ha eliminado el registro</h2>";
				printf ("<br><a href='registroIntolerancias.php'><button class='lila'>volver</button></a>");
			}else{
				echo "<h2>No se ha podido eliminar el registro</h2>";
				printf ("<br><a href='registroIntolerancias.php'><button class='lila'>volver</button></a>");
			}	
		}else{
		
	
	 ?><form action="" method="post">
	 <table>
		 <tr>
			 <td colspan="4"><h1>Registro de Intolerancias</h1><hr></td>
		 </tr>
		 <tr>
			 <td><label>Id Alumno</label></td>
			 <td><input type="text" name="idAlumno" class="redondeado"></td>
		 </tr>
		 <tr>
			 <td colspan="3"><label><strong><p><h2> Intolerancias</h2></p></strong></label></td>	
		 </tr>	
		 <?php
		 ?>
		 <tr>
			 <td colspan="3">
				 
				 <label><input type="checkbox" value="Gluten" name="intolerancia[]" class="check" >GLUTEN</label>
				 
				 <label><input type="checkbox" value="Lacteos" name="intolerancia[]" class="check">LACTEOS</label>
				 
				 <label><input type="checkbox" value="Huevo" name="intolerancia[]" class="check">HUEVO</label>					
			 </td>	
		 </tr>
		 <tr>
			 <td colspan="3">
				 
				 <label><input type="checkbox" value="Marisco" name="intolerancia[]" class="check">MARISCO</label>
			 
				 <label><input type="checkbox" value="Moluscos" name="intolerancia[]" class="check">MOLUSCOS</label>
				 
				 <label><input type="checkbox" value="Crustaceos" name="intolerancia[]" class="check">CRUSTACEOS</label>					
			 </td>
		 <tr>
			 <td colspan="3">
				 
				 <label><input type="checkbox" value="Cacahuete" name="intolerancia[]" class="check">CACAHUETE</label>
				 
				 <label><input type="checkbox" value="Soja" name="intolerancia[]" class="check">SOJA</label>
				 
				 <label><input type="checkbox" value="Pescado" name="intolerancia[]" class="check">PESCADO</label>					
			 </td>
		 <tr>
			 <td colspan="3">
				 
				 <label><input type="checkbox" value="Sesamo" name="intolerancia[]" class="check">SESAMO</label>
				 
				 <label><input type="checkbox" value="Apio" name="intolerancia[]" class="check">APIO</label>
				 
				 <label><input type="checkbox" value="Sulfitos" name="intolerancia[]" class="check">SULFITOS</label>	
			 </td>	
		 </tr>
		 
		 <tr>
			 <td colspan="3">
			 <label><input type="checkbox" value="Frutos_secos" name="intolerancia[]" class="check">FRUTOS SECOS</label>	
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