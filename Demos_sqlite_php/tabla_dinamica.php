<?php
include_once __DIR__ . "/conexion_db.php"; #Al incluir este script, podemos usar $baseDeDatos

$resultado = $baseDeDatos->query("SELECT * FROM videojuegos;");
$videojuegos = $resultado->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla dinamica</title>
	<style>
		table, th, td {
		    border: 1px solid black;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Título</th>
				<th>Año</th>
				<th>Género</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<!-- Notar que siempre se repite lo que hay entre <tr> y </tr> -->
			<!-- Así que lo hacemos en un ciclo foreach -->

			<?php foreach($videojuegos as $videojuego){ /*Notar la llave que dejamos abierta*/ ?>
				<tr>
					<td><?php echo $videojuego->titulo ?></td>
					<td><?php echo $videojuego->anio ?></td>
					<td><?php echo $videojuego->genero ?></td>
					<td>
						<a href="editar.php?id=<?php echo $videojuego->id ?>">Editar</a>
					</td>
					<td>
						<a href="eliminar.php?id=<?php echo $videojuego->id ?>">Eliminar</a>
					</td>
				</tr>
			<?php } /*Cerrar llave, fin de foreach*/ ?>

		</tbody>
    </table>
    <br>
    <br>
    <form action="formulario_videojuego.html">
		<br><br>
		<button type="submit">Agregar nuevo juego</button>
	</form>
</body>
</html>