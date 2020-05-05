<?php 

require_once "conexion.php";

	class Intolerancia{

		private $idAlumno;
		private $idIntolerancia;
		private $intolerancia;


		const TABLA4 = 'intolerancia';

   		public function getidAlumno() {
    	  return $this->idAlumno;
   		}


	   public function getidIntolerancia() {
	      return $this->idIntolerancia;
	   }

	   public function getintolerancia() {
	      return $this->intolerancia;
	   }

		
		public function setidAlumno($idAlumno) {
	      $this->codAlumno = $idAlumno;
	   }

	   public function setidIntolerancia($idIntolerancia) {
	      $this->codIntolerancia = $idIntolerancia;
	   }


	   public function setintolerancia($intolerancia) {
	      $this->intolerancia = $intolerancia;
	   }

	   

	   public function __construct($idAlumno=null, $idIntolerancia, $intolerancia) {
	      $this->idAlumno = $idAlumno;
	      $this->idIntolerancia = $idIntolerancia;
	      $this->intolerancia = $intolerancia;

	   }

	}

 ?>