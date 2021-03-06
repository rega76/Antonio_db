<?php 

require_once "conexion.php";

	class Tutor{
		
		private $dni;
		private $idAlumno;
		private $nombre;
		private $apellidos;
		private $telefono;
		private $direccion;
		private $provincia;
		private $municipio;
		private $codPostal;
		private $estadoCivil;


		public function getDni() {
			return $this->dni;
		}
		
		public function getIdAlumno() {
	  		 return $this->idAlumno;
		}

   		public function getNombre() {
	      return $this->nombre;
	   }

	   public function getApellidos() {
	      return $this->apellidos;
	   }
	   public function getTelefono() {
    	  return $this->telefono;
   		}

	   public function getDireccion() {
	      return $this->direccion;
	   }

	   public function getProvincia() {
	      return $this->provincia;
	   }
	   public function getMunicipio() {
	      return $this->municipio;
	   }

	   public function getCodPostal() {
	      return $this->codPostal;
	   }

	   public function getEstadoCivil() {
	      return $this->estadoCivil;
	   }
		
	   public function setDni($dni) {
			$this->dni = $dni;
		}
	   public function setidAlumno($idAlumno) {
		 $this->idAlumno = $idAlumno;
	  }
		public function setNombre($nombre) {
	      $this->nombre = $nombre;
	   }
	   public function setApellidos($apellidos) {
	      $this->apellidos = $apellidos;
	   }

	   public function setTelefono($telefono) {
	      $this->telefono = $telefono;
	   }

	   public function setDireccion($direccion) {
	      $this->direccion = $direccion;
	   }

	   public function setProvincia($provincia) {
	      $this->provincia = $provincia;
	   }

	   public function setMunicipio($municipio) {
	      $this->municipio = $municipio;
	   }
	   public function setCodPostal($codPostal) {
	      $this->codPostal = $codPostal;
	   }

	   public function setEstadoCivil($estadoCivil) {
	      $this->estadoCivil = $estadoCivil;
	   }

	   public function __construct($dni,$idAlumno, $nombre, $apellidos,$telefono,$direccion, $provincia, $municipio,$codPostal,$estadoCivil) {
	     
	     
	      $this->dni = $dni;
	      $this->idAlumno = $idAlumno;
	      $this->nombre = $nombre;
	      $this->apellidos = $apellidos;
	      $this->telefono = $telefono;
	      $this->direccion = $direccion;
	      $this->provincia = $provincia;
	      $this->municipio = $municipio;
	      $this->codPostal = $codPostal;
	      $this->estadoCivil = $estadoCivil; 
	    }

	    public function guardar(){

	      $conexion = new Conexion();
	     if($this->dni){
	      	 $consulta = $conexion->prepare('INSERT INTO tutor (dni,idAlumno, nombre,apellidos,telefono,direccion,provincia,municipio,codPostal,estadoCivil) 
	         	VALUES(:dni,:idAlumno, :nombre,:apellidos,:telefono,:direccion,:provincia,:municipio,:codPostal,:estadoCivil)');
			
			 $consulta->bindParam(':dni', $this->dni);   
			 $consulta->bindParam(':idAlumno', $this->idAlumno);    
	         $consulta->bindParam(':nombre', $this->nombre);
	         $consulta->bindParam(':apellidos', $this->apellidos);
	         $consulta->bindParam(':telefono', $this->telefono);
	         $consulta->bindParam(':direccion', $this->direccion);
	         $consulta->bindParam(':provincia', $this->provincia);
	         $consulta->bindParam(':municipio', $this->municipio);
	         $consulta->bindParam(':codPostal', $this->codPostal);
	         $consulta->bindParam(':estadoCivil', $this->estadoCivil);
	         $consulta->execute();
			return $consulta;
	        
		}
		$conexion = null; 
		}

		public function modificar($dni,$idAlumno,$nombre,$apellidos,$telefono,$direccion,$provincia,$municipio,$codPostal,$estadoCivil){
			$conexion =new Conexion();

			if($dni == true){
			$consulta = $conexion->prepare('UPDATE tutor SET  dni = :dni,idAlumno=:idAlumno, nombre = :nombre, apellidos = :apellidos, telefono = :telefono,
										   direccion = :direccion, provincia = :provincia,municipio = :municipio,codPostal = :codPostal,estadoCivil = :estadoCivil
										   WHERE dni = :dni' );

			  $consulta->bindParam(':dni', $dni);
			  $consulta->bindParam('idAlumno',$idAlumno);
	         $consulta->bindParam(':nombre', $nombre);
	         $consulta->bindParam(':apellidos', $apellidos);
	         $consulta->bindParam(':telefono', $telefono);
	         $consulta->bindParam(':direccion', $direccion);
	         $consulta->bindParam(':provincia', $provincia);
	         $consulta->bindParam(':municipio', $municipio);
	         $consulta->bindParam(':codPostal', $codPostal);
	         $consulta->bindParam(':estadoCivil', $estadoCivil);
	         $respuesta=$consulta->execute();

	         if($respuesta == true){
					return $respuesta;
	         }
			}
			$conexion = null; 
		}

	/*	public static function tutorAmodificar($dni){
			$conexion=new Conexion();
			if($dni == true){
			$consulta = $conexion->prepare('SELECT * FROM tutor WHERE dni = :dni');
			$consulta->bindParam(':dni', $dni);       
			$consulta->execute();
			$registro = $consulta->fetch();
				if($registro){
					return $registro;
				}
			}
		}
	*/
		public static function eliminar($dni){
			$conexion =new Conexion();
			if($dni == TRUE){
				$consulta = $conexion->prepare('DELETE FROM tutor  WHERE  dni = :dni' );
				
				$consulta->bindParam(':dni', $dni);
				$consulta->execute();	
				
					printf ('<h2 style="color:white;">El registro se ha eliminado con exito.<h2>');
					printf ("<br><a href='registroTutores.php'><button class='lila'>volver</button></a>");
				         				
			}else{
					printf ('<h2 style="color:white;"> No se ha podido eliminar el registro. <h2>');
					printf ("<br><a href='registroTutores.php'><button class='lila'>volver</button></a>");
				}
			$conexion = null; 
		}
		public static function ver($dni){
			$conexion = new Conexion();
			if($dni == TRUE){
			$consulta = $conexion->prepare('SELECT * FROM tutor WHERE dni = :dni'); 	         	 
			$consulta->bindParam(':dni', $dni); 
			$consulta->execute();      
			$registros=$consulta->fetch();
			return $registros;	
			}	
					  
			$conexion = null;   
		}

		public static function verTodos(){
			$conexion = new Conexion();
			$consulta = $conexion->prepare('SELECT * FROM tutor order by idAlumno'); 	         	 			
			$consulta->execute();      
			$registros=$consulta->fetchAll();
			return $registros;	
					  
			$conexion = null;   
		}
	}	
 ?>