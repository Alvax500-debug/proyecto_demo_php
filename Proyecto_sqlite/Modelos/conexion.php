<?php
$baseDeDatos = new PDO("sqlite:" . __DIR__ . "/../Recursos/proyecto_sql.db");
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>