<?php
    require_once "conexion.php";
    class consultaG {
      private $idAlumno;
		private $nombre;
		private $apellidos;
		private $edad;
		private $curso;
		private $transporteEscolar;

        const TABLA_ALUMNOS = 'alumno';
        
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

         public static function verTodos($idAlumno){

            $conexion = new Conexion();
    
             $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA_ALUMNOS);
                       
                 $consulta->execute();
                    
                ?>
                <br>
                      <table class="lista" >
                      <h2 style='color:yellow;'>LISTADO DE ALUMNOS </h2>
                          <tr class="cabecera">
                              <th>ID ALUMNO<hr></th>
                              <th>NOMBRE<hr></th>
                              <th>APELLIDOS<hr></th>
                              <th>EDAD<hr></th>
                              <th>CURSO<hr></th>
                              <th>TRANSPORTE ESCOLAR<hr></th>
                          </tr>
                        
                  <?php
                 while ($registro = $consulta->fetch()) {
    
                      ?>
                          <tr>
                              <td ><?php echo $registro['idAlumno']; ?><hr></td>
                              <td><?php echo $registro['nombre']; ?><hr></td>
                              <td><?php echo $registro['apellidos']; ?><hr></td>
                              <td><?php echo $registro['edad']; ?><hr></td>
                              <td><?php echo $registro['curso']; ?><hr></td>
                              <td><?php echo $registro['transporteEscolar']; ?><hr></td>
                          </tr>
                      <?php
                      
                      echo '<br>';
                  }

                  ?>
                      </table>
                  <?php
                  printf ("<br/><button class='lila'><a href='index.php'>Volver</a></button>");
        
                  $conexion = null; 
            }
    }





?>