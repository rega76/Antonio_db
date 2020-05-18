<?php 

require_once "conexion.php";

	class TutorAlumno {
		private $dni;
		private $idAlumno;

		const TABLA3 = 'tutor_alumno';

   		
   		public function getDni() {
    	  return $this->dni;
   		}
	   public function getIdAlumno() {
	      return $this->idAlumno;
	   }

	
		public function setDni($dni) {
	      $this->dni = $dni;
	   }
		public function setIdAlumno($idAlumno) {
	      $this->idAlumno = $idAlumno;
	   }

	
	   public function __construct($dni,$idAlumno) {
	      
	    $this->dni = $dni;
		$this->idAlumno = $idAlumno;

	   }

	   public function guardar2(){

	     $conexion = new Conexion(); 

         if($this->dni == TRUE){
	      	 $insert = $conexion->prepare('INSERT INTO ' . self::TABLA3 .' (dni,idAlumno) 
	         	VALUES(:dni,:idAlumno)');
	      
			 $insert->bindParam(':dni', $this->dni);       
	         $insert->bindParam(':idAlumno', $this->idAlumno);
	         $insert->execute();

		}
		$conexion = null; 
	}

	public static function eliminar2($dni){
		$conexion =new Conexion();
		if($dni == TRUE){
			$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA3 .' WHERE  dni = :dni' );
			
			$consulta->bindParam(':dni', $dni);
			$consulta->execute();	
			
									 
		}
		$conexion = null; 
	}

	

	

}