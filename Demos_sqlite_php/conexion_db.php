<?php
$baseDeDatos = new PDO("sqlite:" . __DIR__ . "/Recursos/videojuegos.db");
$baseDeDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>