<?php 
//CREO UNA CLASE PARA LA CONEXION A LA BASE DE DATOS.
 class Conexion extends PDO { 
   private $tipo_de_base = 'mysql';
   private $host = 'localhost';
   private $nombre_de_base = 'ajrg_comedor';
   private $usuario = 'root';
   private $contrasena = ''; 
   public function __construct() {
      //SOBREESCRIBO EL MÉTODO CONSTRUCTOR DE LA CLASE PDO.
      try{
         parent::__construct("{$this->tipo_de_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8", $this->usuario, $this->contrasena);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 }

?>