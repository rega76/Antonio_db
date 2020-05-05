<?php 

require_once "conexion.php";
//CREO LA CLASE
	class Alumno{
//ATRIBUTOS DE LA CLASE
		private $idAlumno;
		private $nombre;
		private $apellidos;
		private $edad;
		private $curso;
		private $transporteEscolar;
//CREO UNA CONSTANTE
		const TABLA = 'alumno';
//METODO GET
   		public function getIdAlumno() {
    	  return $this->idAlumno;
   		}

   		public function getNombre() {
	      return $this->nombre;
	   }

	   public function getApellidos() {
	      return $this->apellidos;
	   }

	   public function getEdad() {
	      return $this->edad;
	   }

	   public function getCurso() {
	      return $this->curso;
	   }
	   public function getTransporteEscolar() {
	      return $this->transporteEscolar;
	   }
 //METODO SETT
	   public function setIdAlumno($idAlumno) {
	     $this->idAlumno = $idAlumno;
	   }
		
		public function setNombre($nombre) {
	      $this->nombre = $nombre;
	   }
	   public function setApellidos($apellidos) {
	      $this->apellidos = $apellidos;
	   }

	   public function setEdad($edad) {
	      $this->edad = $edad;
	   }

	   public function setCurso($curso) {
	      $this->curso = $curso;
	   }

	   public function setTransporteEscolar($transporteEscolar) {
	      $this->transporteEscolar = $transporteEscolar;
	   }
//CREO EL  METODO CONSTRUCTOR
	   public function __construct($idAlumno=null, $nombre, $apellidos,$edad, $curso, $transporteEscolar) {
	      $this->idAlumno = $idAlumno;
	      $this->nombre = $nombre;
	      $this->apellidos = $apellidos;
	      $this->edad = $edad;
	      $this->curso = $curso;
	      $this->transporteEscolar = $transporteEscolar;
	   }
//METODO PARA GUARDAR DATOS EN LA TABLA ALUMNO
	   public function guardar(){

	    $conexion = new Conexion();
	    if(!$this->idAlumno) /*Modifica*/ {
	      	 $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' ( nombre,apellidos,edad,curso,transporteEscolar) 
	         	VALUES(:nombre,:apellidos,:edad,:curso,:transporteEscolar)');
	             
	         $consulta->bindParam(':nombre', $this->nombre);
	         $consulta->bindParam(':apellidos', $this->apellidos);
	         $consulta->bindParam(':edad', $this->edad);
	         $consulta->bindParam(':curso', $this->curso);
	         $consulta->bindParam(':transporteEscolar', $this->transporteEscolar);
	         $respuesta1=$consulta->execute();
			$this->idAlumno = $conexion->lastInsertId();
			
	        if($respuesta1){
				printf ("<h2 style='color:yellow;'>Alumno registrado con exito.</h2>");
			      printf ("<br/><button class='lila'><a href='registroAlumnos.php'>Volver</a></button>");
			}else{
				printf ("<h2 style='color:yellow;'>No se pudo registrar al alumno.</h2><br>");
				printf ("<h2 style='color:yellow;'>El alumno ya existe o faltan datos.</h2>");
				printf ("<br><a href='registroAlumnos.php'><button class='lila'>volver</button></a>");
			}
		}
		$conexion = null; 
		}
//METODO PARA MODIFICAR DATOS EN LA TABLA ALUMNO
		public static function modificar($idAlumno,$nombre,$apellidos,$edad,$curso,$transporteEscolar){
			$conexion =new Conexion();

			if($idAlumno == TRUE){
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET idAlumno = :idAlumno, nombre = :nombre, apellidos = :apellidos, edad = :edad,curso = :curso, transporteEscolar = :transporteEscolar WHERE idAlumno = :idAlumno' );

	     	 $consulta->bindParam(':idAlumno', $idAlumno);
	         $consulta->bindParam(':nombre', $nombre);
	         $consulta->bindParam(':apellidos', $apellidos);
	         $consulta->bindParam(':edad', $edad);
	         $consulta->bindParam(':curso', $curso);
	         $consulta->bindParam(':transporteEscolar', $transporteEscolar);
	         $respuesta2=$consulta->execute();
	         if($respuesta2){
				printf ("<h2 style='color:yellow;'>Alumno Modificado </h2><br>");
				printf ("<br><a href='registroAlumnos.php'><button class='lila'>volver</button></a>");
			}else{
				printf ("<h2 style='color:yellow;''>No se pudo modificar al alumno.</h2><br>");
				printf ("<br><a href='registroAlumnos.php'><button class='lila'>volver</button></a>");
			}
			}
			$conexion = null; 
		}
//METODO PARA ELIMINAR DATOS DE LA TABLA ALUMNOS
		public static function eliminar($idAlumno){
			$conexion =new Conexion();

			if($idAlumno){

			$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA .'  WHERE idAlumno = :idAlumno' );

	     	 $consulta->bindParam(':idAlumno', $idAlumno);

	         $respuesta=$consulta->execute();

	         if($respuesta == TRUE){
	         	printf ("<h2 style='color:yellow;'>Alumno eliminado con exito.</h2>");
	         	printf ("<br/><button class='lila'><a href='registroAlumnos.php'>Volver</a></button>");
	         }else{
	         	pritf ("<h2 style='color:yellow;'>No se pudo eliminar al alumno.</h2>");
	         	printf ("<br/><button class='lila'><a href='registroAlumnos.php'>Volver</a></button>");
	         }
	         
			}
			$conexion = null; 
		}
//METODO PARA VER LOS DATOS DE LA TABLA ALUMNO
		public static function ver($idAlumno){

	      $conexion = new Conexion();

	      	 $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA.'
	         	 WHERE idAlumno = :idAlumno');
	      
			 $consulta->bindParam(':idAlumno', $idAlumno);       
	         $consulta->execute();

	        $registro = $consulta->fetch();
	        echo '<br>';
			 echo '<br>';
			 echo '<br>';
			 echo '<h2 style="color:#04F702;">Datos Alumno/a.</h2><br>';
	        ?><table class="	lista">
				<tr class="cabecera">
					<th>Id Alumno<hr></th>
					<th>Nombre<hr></th>
					<th>Apellidos<hr></th>
					<th>Edad<hr></th>
					<th>Curso<hr></th>
					<th>Transporte Escolar<hr></th>
				</tr>
			<?php
	        	if($registro){
			?>	
				<tr>
					<td><?php  echo $registro['idAlumno']; ?></td>
					<td><?php echo $registro['nombre']; ?></td>
					<td><?php echo $registro['apellidos']; ?></td>
					<td><?php echo $registro['edad']; ?></td>
					<td><?php echo $registro['curso']; ?></td>
					<td><?php echo $registro['transporteEscolar']; ?></td>
				</tr>	
			<?php		    
			}
			?>
			</table>
			<a href="registroAlumnos.php"><button class='lila'>volver</button></a> 
			<?php
		}
	}
?>