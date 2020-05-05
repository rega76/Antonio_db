<?php 

require_once "conexion.php";

	class Tutor{
		
		private $idAlumno;
		private $dni;
		private $nombre;
		private $apellidos;
		private $telefono;
		private $direccion;
		private $provincia;
		private $municipio;
		private $codPostal;
		private $estadoCivil;

		const TABLA2 = 'tutor';
	
   		public function getIdAlumno() {
    	  return $this->idAlumno;
   		}

   		public function getDni() {
    	  return $this->dni;
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
		
		public function setidAlumno($idAlumno) {
	      $this->idAlumno = $idAlumno;
	   }
		public function setDni($dni) {
	      $this->dni = $dni;
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
	     if($this->dni) /*Modifica*/ {
	      	 $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA2 .' (dni,idAlumno, nombre,apellidos,telefono,direccion,provincia,municipio,codPostal,estadoCivil) 
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
	         $respuesta3=$consulta->execute();

	        if($respuesta3 == TRUE){

	         	printf ('<h3 style="color:yellow;"> El registro se ha realizado con exito.<h3>');
	         	printf ("<br><a href='registroTutores.php'><button>volver</button></a>");
	         }else{
	         	printf ('<h3 style="color:yellow;"> El registro con dni: '.$this->dni.' ya existe.<h3>');
	         	printf ("<br><a href='registroTutores.php'><button>volver</button></a>");
	         }
		}
		$conexion = null; 
		}

		public static function modificar($dni,$nombre,$apellidos,$telefono,$direccion,$provincia,$municipio,$codPostal,$estadoCivil){
			$conexion =new Conexion();

			if($dni){
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA2 .' SET  dni = :dni, nombre = :nombre, apellidos = :apellidos, telefono = :telefono,direccion = :direccion, provincia = :provincia,municipio = :municipio,codPostal = :codPostal,estadoCivil = :estadoCivil WHERE dni = :dni' );

	     	 $consulta->bindParam(':dni', $dni);
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

	         	printf ('<h3 style="color:yellow;"> Los datos del tutor con DNI: '. $dni.' han sido modificados.<h3>');
	         	printf ("<br><a href='registroTutores.php'><button>volver</button></a>");
	         }
			}
			$conexion = null; 
		}

		public static function eliminar($dni){
			$conexion =new Conexion();

			if($dni == TRUE){
			$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA2 .'  WHERE dni = :dni' );

	     	 $consulta->bindParam(':dni', $dni);

	         $respuesta2=$consulta->execute();
	         
	         if($respuesta2 == true){

	         	printf ('<h3 style="color:yellow;"> El registro se ha eliminado con exito.<h3>');
	         	printf ("<br><a href='registroTutores.php'><button>volver</button></a>");
	         }
			}
			$conexion = null; 
		}
		public static function ver($idAlumno){

	      $conexion = new Conexion();

	      	 $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA2.'
	         	 WHERE idAlumno = :idAlumno');
	      
			 $consulta->bindParam(':idAlumno', $idAlumno);       
	         $consulta->execute();

	         ?>
	         	<table class="lista">
		 			<tr class="cabecera">
		 				<th>DNI<hr></th>
		 				<th>Nombre<hr></th>
		 				<th>Apellidos<hr></th>
		 				<th>Telefono<hr></th>
		 				<th>Direcccion<hr></th>
		 				<th>Provincia<hr></th>	
		 				<th>Municipio<hr></th>
		 				<th>C.P<hr></th>
		 				<th>Estado Civil<hr></th>
		 			</tr>
	         <?php
	       		 while ($registro = $consulta->fetch()) {
	       		 ?>			
	       		 	<tr>	
		 				<td><?php  echo $registro['dni']; ?></td>
		 				<td><?php echo $registro['nombre']; ?></td>
		 				<td><?php echo $registro['apellidos']; ?></td>
		 				<td><?php echo $registro['telefono']; ?></td>
		 				<td><?php echo $registro['direccion'];?></td>
		 				<td><?php echo $registro['provincia'];?></td>
		 				<td><?php echo $registro['municipio']; ?></td>
		 				<td><?php echo $registro['codPostal'];?></td>
		 				<td><?php echo $registro['estadoCivil'];?></td>
		 			</tr>		 		
			 	<?php
				  }
				  ?> </table> <?php
				  printf ("<br/><button class='lila'><a href='registroTutores.php'>Volver</a></button>");
			$conexion = null;   
		}
	}	


 ?>