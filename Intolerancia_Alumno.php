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


		public function setIdAlumno($IdAlumno) {
	      $this->IdAlumno = $IdAlumno;
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

	      	 $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA5 .' ( idAlumno,intolerancia) 
	         	VALUES(:idAlumno,:intolerancia)');
	      
			 $consulta->bindParam(':idAlumno', $this->idAlumno);       
	         $consulta->bindParam(':intolerancia', $this->intolerancia);
	         $respuesta1=$consulta->execute();

	        if($respuesta1){
				printf ("<h2 style='color:yellow;'>Intolerancia registrada con exito.</h2>");
			      printf ("<br/><button class='lila'><a href='registroIntolerancias.php'>Volver</a></button>");
			}else{
				printf ("<h2 style='color:yellow;'>No se pudo registrar.</h2><br>");
				printf ("<br><a href='registroIntolerancias.php'><button class='lila'>volver</button></a>");
			}
		$conexion = null; 
		}

		public  function borrar($idAlumno,$intolerancia){
			$conexion =new Conexion();

			$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA5 .' WHERE idAlumno = :idAlumno and intolerancia = :intolerancia ' );

	     	$consulta->bindParam(':idAlumno', $idAlumno);
	         $consulta->bindParam(':intolerancia', $intolerancia);
	         $respuesta0 = $consulta->execute();
	          //$this->idAlumno = $conexion->lastInsertId();
			if($respuesta0 == TRUE){
				printf ("<h2  style='color:yellow;'>Se ha eliminado correctamente</h2>");
				printf ("<br><a href='registroIntolerancias.php'><button class='lila'>volver</button></a>") ;
			}else{
				printf("<h2  style='color:yellow;'>No se pudo eliminar.</h2>");
				printf ("<br><a href='registroIntolerancias.php'><button class='lila'>volver</button></a>") ;
			}

			$conexion = null; 
		}

		public static function ver($idAlumno){

		$conexion = new Conexion();

		 $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA5.' WHERE idAlumno = :idAlumno');
			 $consulta->bindParam(':idAlumno', $idAlumno);        
	         $consulta->execute();
				echo "<h2  style='color:yellow;'>Intolerancias del alumno con codigo: ".$idAlumno.'</h2><br>';
			?>
		  		<table class="lista">
		  			<tr class="cabecera">
		  				<th><h3>Nombre de Intolerancia/s<hr></h3></th style="color;yellow;">
		  			</tr>
		  	<?php
			  while ($registro = $consulta->fetch()) {

			  	?>
			  		<tr>
			  			<td><?php echo $registro['intolerancia']; ?><hr></td>
			  		</tr>
			  	<?php
			  	
			  	echo '<br>';
			  }

			  ?>
			  	</table>
			  <?php
			  printf ("<br/><button class='lila'><a href='registroIntolerancias.php'>Volver</a></button>");
	
			  $conexion = null; 
		}
	}

 ?>