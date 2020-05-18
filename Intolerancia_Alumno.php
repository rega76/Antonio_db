<?php 

require_once "conexion.php";

	class Intolerancia_Alumno{

		private $idAlumno;
		private $idIntolerancia;
		private $intolerancia;


		const TABLA5 = 'intolerancia_alumno';

//METODOS GET

   		public function getidAlumno() {
    	  return $this->idAlumno;
   		}

   		public function getidIntolerancia() {
	      return $this->idIntolerancia;
	   }

	   public function getIntolerancia() {
	      return $this->intolerancia;
	   }



//METODOS SET


		public function setIdAlumno($idAlumno) {
	      $this->idAlumno = $idAlumno;
	   }

	   public function setidIntolerancia($idIntolerancia) {
	      $this->idIntolerancia = $idIntolerancia;
	   }
	   public function setIntolerancia($intolerancia) {
	      $this->intolerancia = $intolerancia;
	   }


//METODO CONSTRUCTOR
	   

	   public function __construct($idAlumno,$intolerancia) {

	      $this->idAlumno = $idAlumno;
	      $this->intolerancia = $intolerancia;

	   }

	   public function guardarIntolerancia(){
	   
	       $conexion = new Conexion();

			   $consulta = $conexion->prepare('INSERT INTO intolerancia_alumno 
			   (idAlumno,intolerancia) 
			   values (:idAlumno,:intolerancia)');
			   
	      
			 $consulta->bindParam(':idAlumno', $this->idAlumno);       
	         $consulta->bindParam(':intolerancia', $this->intolerancia);
			 $consulta->execute();
			 $this->idAlumno = $conexion->lastInsertId();
		
		$conexion = null; 
		}
		

		public function eliminar($idAlumno,$intolerancia){
			$conexion =new Conexion();
			
			$consulta = $conexion->prepare('DELETE FROM intolerancia_alumno WHERE idAlumno = :idAlumno and intolerancia = :intolerancia ' );
			$consulta->bindParam(':idAlumno', $idAlumno); 
			$consulta->bindParam(':intolerancia', $intolerancia);
			$consulta->execute();
			
				
			$conexion = null; 
		}

		public static function ver($idAlumno){

		$conexion = new Conexion();

		 $consulta = $conexion->prepare('SELECT * FROM intolerancia_alumno join intolerancia  WHERE
		 								intolerancia_alumno.intolerancia=intolerancia.intolerancia and idAlumno = :idAlumno');
			 $consulta->bindParam(':idAlumno', $idAlumno);        
			 $consulta->execute();
			 $registros = $consulta->fetchAll();
      	 	 return $registros;
			 $conexion = null; 
		}
	}

 ?>