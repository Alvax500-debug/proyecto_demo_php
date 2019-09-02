<?php
    //Para la conexion con DB
    class Conexion{
        //Propiedades
        protected $host;
        protected $port;
        protected $user;
        protected $pass;
        protected $db;

        //Constructor
        public function _construct(){
            $this->host = "localhost";
            $this->port = "3306";
            $this->user = "demo1";
            $this->pass = "demo1";
            $this->db = "proyecto_demo";
        }

        //Metodos
        public function conectar(){
            $ubicacion_db = $this->host. ":" .$this->port;
            $db_conexion = mysql_connect($ubicacion_db, $this->user, $this->pass, $this->db);
            return $db_conexion;
        }

        public function cerrar_conexion($connection){
            $cierre = mysql_close($connection);
            return $cierre;
        }
    }
?>