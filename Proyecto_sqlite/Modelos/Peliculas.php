<?php
    
    include_once __DIR__ . "/conexion.php"; #Al incluir este script, podemos usar $baseDeDatos

    class Peliculas{
        #Atributos
        public $titulo_principal;
        public $genero;
        public $anio;
        public $calificacion;
        public $otros_titulos;
        public $recomendacion;
        public $motivo;
        public $activo;

        #Metodos
        public function nueva_resena($titulo_principal,$genero,$anio,$calificacion,$otros_titulos,$recomendacion,$motivo){
            $sentencia = $baseDeDatos->prepare("INSERT INTO peliculas(titulo,genero,anio,calificacion,titulo_alterno,recomendacion,motivo,activo)
                VALUES(".$titulo_principal.",".$genero.",".$anio.",".$calificacion.",".$otros_titulos.",".$recomendacion.",".$motivo.",1);");
            $resultado=$sentencia->execute();
            if ($resultado === true) {
                # code...
            } else {
                # code...
            }
            $sentencia = null;
            $baseDeDatos = null;
        }

        public function actualizar_resena($id,$titulo_principal,$genero,$anio,$calificacion,$otros_titulos,$recomendacion,$motivo){
            $sentencia = $baseDeDatos->prepare("UPDATE peliculas
                SET titulo = ".$titulo_principal.",
                genero = ".$genero.",
                anio = ".$anio.",
                calificacion = ".$calificacion.",
                titulo_alterno = ".$otros_titulos.",
                recomendacion = ".$recomendacion.",
                motivo = ".$motivo."
                WHERE id = ".$id);

            $resultado=$sentencia->execute();
            if ($resultado === true) {
                # code...
            } else {
                # code...
            }
            $sentencia = null;
            $baseDeDatos = null;
        }

        public function desactivar_resena($id){
            $sentencia = $baseDeDatos->prepare("UPDATE peliculas
                SET activo = 0
                WHERE id = ".$id);

            $resultado=$sentencia->execute();
            if ($resultado === true) {
                # code...
            } else {
                # code...
            }
            $sentencia = null;
            $baseDeDatos = null;
        }

        public function eliminar_resena($id){
            $sentencia = $baseDeDatos->prepare("DELETE FROM peliculas
                WHERE id = ".$id);

            $resultado=$sentencia->execute();
            if ($resultado === true) {
                # code...
            } else {
                # code...
            }
            $sentencia = null;
            $baseDeDatos = null;
        }
    }
?>