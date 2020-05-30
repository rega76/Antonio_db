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

	}

 ?>