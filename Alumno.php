<?php 

require_once "conexion.php";
//CREO LA CLASE
	class Alumno{
//ATRIBUTOS DE LA CLASE
		private $idAlumno=null;
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
	    if($this->nombre ==true ){
	      	 $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' ( nombre,apellidos,edad,curso,transporteEscolar) 
	         	VALUES(:nombre,:apellidos,:edad,:curso,:transporteEscolar)');
	             
	        $consulta->bindParam(':nombre', $this->nombre);
	        $consulta->bindParam(':apellidos', $this->apellidos);
	        $consulta->bindParam(':edad', $this->edad);
	        $consulta->bindParam(':curso', $this->curso);
	        $consulta->bindParam(':transporteEscolar', $this->transporteEscolar);
	       $consulta->execute();
			$this->idAlumno = $conexion->lastInsertId();
		//	if($respuesta1){
		//		return $respuesta1;
		//	}	
			echo "<h2 style='color:white;'>El Alumno se ha registrado con el id:  " . $this->idAlumno."</h2>";
			    printf ("<br/><a href='registroAlumnos.php'><button class='lila'>Volver</button></a>");	
		}else{
			echo "<h2 style='color:white;'>No se pudo realizar el registro.</h2>";
			    printf ("<br/><a href='registroAlumnos.php'><button class='lila'>Volver</button></a>");
		}
		$conexion = null; 
		}
//METODO PARA MODIFICAR DATOS EN LA TABLA ALUMNO
		public static function alumnoAmodificar($idAlumno){
			$conexion =new Conexion();
			if($idAlumno){
					$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA.' WHERE idAlumno = :idAlumno');
					$consulta->bindParam(':idAlumno', $idAlumno);       
					$consulta->execute();
					$registro = $consulta->fetch();
					if($registro){
						return $registro;
					}
				}
			$conexion = null; 
		}

		public  function modificar($idAlumno,$nombre, $apellidos,$edad, $curso, $transporteEscolar){
			$conexion =new Conexion();
			if($idAlumno){
				$consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET idAlumno = :idAlumno, nombre = :nombre, apellidos = :apellidos, edad = :edad,curso = :curso, transporteEscolar = :transporteEscolar WHERE idAlumno = :idAlumno' );
				$consulta->bindParam(':idAlumno', $idAlumno);
				$consulta->bindParam(':nombre', $nombre);
				$consulta->bindParam(':apellidos', $apellidos);
				$consulta->bindParam(':edad', $edad);
				$consulta->bindParam(':curso', $curso);
				$consulta->bindParam(':transporteEscolar', $transporteEscolar);
				$respuesta2=$consulta->execute();
				return $respuesta2;
			}	
		$conexion = null; 
	
		}		
	
		
//METODO PARA ELIMINAR DATOS DE LA TABLA ALUMNOS
		public static function eliminar($idAlumno){
			$conexion =new Conexion();
				if($idAlumno){
					$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA .'  WHERE idAlumno = :idAlumno' );
					$consulta->bindParam(':idAlumno', $idAlumno);
					$consulta->execute();         
				}
			$conexion = null; 
		}
//METODO PARA VER LOS DATOS DE LA TABLA ALUMNO
		public static function ver($idAlumno){
	    	$conexion = new Conexion();
				if($idAlumno){
					$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA.' WHERE idAlumno = :idAlumno');
					$consulta->bindParam(':idAlumno', $idAlumno);       
					$consulta->execute();
					$registro = $consulta->fetch();
					if($registro){
						return $registro;
					}
				}
			$conexion = null; 
		}
	}
?>