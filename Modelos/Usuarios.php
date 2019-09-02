<?php

    require 'ConnectDB.php';

    class Usuarios extends Conexion{
        
        //constructor y destructor
        public function _construct(){
            print("New User");
        }
        public function _destruct(){
            print("Finish User");
        }

        //Propiedades
        private $id;
        protected $user;
        protected $password;
        private $boleta;
        protected $nombre;
        private $edad;
        protected $telefono;
        protected $email;
        private $carrera;
        private $fecha_alta;
        private $fecha_modificacion;
        private $activo;

        //Metodos
        public function registrarUsuarios(){

        }

        public function obtenerUsuarios(){

        }

        //private function iniciarSesion(){}

        public function actualizarDatos(){

        }

        //private function cambiarContrasena(){}

        public function desactivarCuenta(){

        }

        public function eliminarCuenta(){

        }

    }

?>