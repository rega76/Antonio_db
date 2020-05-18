<?php 

require_once "conexion.php";

	class Intolerancia{

		
		private $idAlumno;
		private $intolerancia;


		const TABLA4 = 'intolerancia';

 
	   public function getIdAlumno() {
	      return $this->idAlumno;
	   }

	   public function getintolerancia() {
	      return $this->intolerancia;
	   }


	   public function setIdAlumno($idAlumno) {
	      $this->idAlumno = $idAlumno;
	   }


	   public function setintolerancia($intolerancia) {
		  
	      $this->intolerancia = $intolerancia;
	   }

	   

	   public function __construct($idAlumno,$intolerancia) {
		 $this->idAlumno= $idAlumno;  
		$this->intolerancia = $intolerancia;

	   }

/*	   public function guardarIntolerancia2(){
	   
		$conexion = new Conexion();

			$consulta = $conexion->prepare('INSERT INTO intolerancia_alumno (idAlumno,intolerancia)
			  VALUES(:idAlumno,:intolerancia)');
	   
		 $consulta->bindParam(':idAlumno', $this->idAlumno);       
		  $consulta->bindParam(':intolerancia', $this->intolerancia);
		  $consulta->execute();
		 // $this->idAlumno = $conexion->lastInsertId();
	 
	 $conexion = null; 
	 }
*/
	}

 ?>