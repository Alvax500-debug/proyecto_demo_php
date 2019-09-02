<?php
    
    require 'ConnectDB.php';

    class Datos_personales extends Conexion{
        //Propiedades
        private $id;
        protected $fullName;
        private $age;
        protected $contact_phone;
        protected $contact_email;
        protected $adress;
        private $activo;
        private $date_creation;
        private $date_modification;
        protected $coments_expell;
        private $coments_motives;

        //Metodos
        public function registrarAlumno(){
            $conexion = conectar();
            $terminar_conexion = cerrar_conexion($conexion);
        }

        public function obtenerAlumnosos(){
            $conexion = conectar();
            $terminar_conexion = cerrar_conexion($conexion);
        }

        //private function iniciarSesion(){}

        public function actualizarDatos(){
            $conexion = conectar();
            $terminar_conexion = cerrar_conexion($conexion);
        }

        //private function cambiarContrasena(){}

        public function desactivarCuenta(){
            $conexion = conectar();
            $terminar_conexion = cerrar_conexion($conexion);
        }

        public function eliminarCuenta(){
            $conexion = conectar();
            $terminar_conexion = cerrar_conexion($conexion);
        }
    }
?>