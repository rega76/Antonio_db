<?php
    require_once "conexion.php";
    class consultaG {
      private $idAlumno;
		private $nombre;
		private $apellidos;
		private $edad;
		private $curso;
      private $transporteEscolar;
  
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

      public function __construct($idAlumno=null, $nombre, $apellidos,$edad, $curso, $transporteEscolar) {
         $this->idAlumno = $idAlumno;
         $this->nombre = $nombre;
         $this->apellidos = $apellidos;
         $this->edad = $edad;
         $this->curso = $curso;
         $this->transporteEscolar = $transporteEscolar;
      }

      public static function verTodos(){

         $conexion = new Conexion();  
         
         $consulta = $conexion->prepare('SELECT *  FROM alumno order by  edad');                                          
         $consulta->execute();
         $respuesta = $consulta->fetchAll();
            if($respuesta){
               return $respuesta;
            }
         $conexion = null; 
      }
    }
?>