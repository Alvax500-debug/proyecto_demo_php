<?php

function insertar(){
    if (empty($_POST["titulo"])) {
        exit("Faltan uno o más datos"); #Terminar el script definitivamente
    }
    
    if (empty($_POST["anio"])) {
        exit("Faltan uno o más datos"); #Terminar el script definitivamente
    }
    
    if (empty($_POST["genero"])) {
        exit("Faltan uno o más datos"); #Terminar el script definitivamente
    }
    
    #Si llegamos hasta aquí es porque los datos al menos están definidos
    include_once __DIR__ . "/conexion_db.php"; #Al incluir este script, podemos usar $baseDeDatos
    
    # creamos una variable que tendrá la sentencia
    $sentencia = $baseDeDatos->prepare("INSERT INTO videojuegos(anio, titulo, genero)
        VALUES(:anio, :titulo, :genero);");
    
    
    # Debemos pasar a bindParam las variables, no podemos pasar el dato directamente
    # debido a que la llamada es por referencia
    
    
    $sentencia->bindParam(":anio", $_POST["anio"]);
    $sentencia->bindParam(":titulo", $_POST["titulo"]);
    $sentencia->bindParam(":genero", $_POST["genero"]);
    $resultado = $sentencia->execute();
    if($resultado === true){
        echo "Videojuego registrado correctamente";
        echo '<br><a href="tabla_dinamica.php">Ver los videojuegos</a>';
    }else{
        echo "Lo siento, ocurrió un error";
    }
}

function modificar(){
    if (empty($_POST["id"])) { # En este caso también necesitamos al ID
        exit("Faltan uno o más datos"); #Terminar el script definitivamente
    }
    
    if (empty($_POST["titulo"])) {
        exit("Faltan uno o más datos"); #Terminar el script definitivamente
    }
    
    if (empty($_POST["anio"])) {
        exit("Faltan uno o más datos"); #Terminar el script definitivamente
    }
    
    if (empty($_POST["genero"])) {
        exit("Faltan uno o más datos"); #Terminar el script definitivamente
    }
    
    #Si llegamos hasta aquí es porque los datos al menos están definidos
    include_once __DIR__ . "/conexion_db.php"; #Al incluir este script, podemos usar $baseDeDatos
    
    # creamos una variable que tendrá la sentencia
    $sentencia = $baseDeDatos->prepare("UPDATE videojuegos 
        SET anio = :anio,
        titulo = :titulo,
        genero = :genero
        WHERE id = :id");
    
    
    
    #Pasar los datos...
    $sentencia->bindParam(":id", $_POST["id"]);#Aquí pasamos el ID
    $sentencia->bindParam(":anio", $_POST["anio"]);
    $sentencia->bindParam(":titulo", $_POST["titulo"]);
    $sentencia->bindParam(":genero", $_POST["genero"]);
    $resultado = $sentencia->execute();
    if($resultado === true){
        echo "Videojuego guardado correctamente";
        echo '<br><a href="tabla_dinamica.php">Ver los videojuegos</a>';
    }else{
        echo "Lo siento, ocurrió un error";
    }
}

function mostrar(){
    include_once __DIR__ . "/conexion_db.php"; #Al incluir este script, podemos usar $baseDeDatos

    $resultado = $baseDeDatos->query("SELECT * FROM videojuegos;");
    if (!empty($resultado)) {
        $videojuegos = $resultado->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($videojuegos);
    } else {
        echo "Lo siento, ocurrió un error";
    }
    
    #$videojuegos = $resultado->fetchAll(PDO::FETCH_OBJ);
}

function mostrar_registro(){
    if (empty($_POST["id"])) { # En este caso también necesitamos al ID
        exit("Faltan uno o más datos"); #Terminar el script definitivamente
    }

    $identificador = $_POST["id"];

    include_once __DIR__ . "/conexion_db.php"; #Al incluir este script, podemos usar $baseDeDatos

    $resultado = $baseDeDatos->query("SELECT * FROM videojuegos WHERE id=".$identificador.";");
    if (!empty($resultado)) {
        $videojuegos = $resultado->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($videojuegos);
    } else {
        echo "Lo siento, ocurrió un error";
    }
}

if (isset($_POST['action'])) {
    switch($_POST['action']) {
    case 'insertar':
        insertar();
        break;
    case 'modificar':
        modificar();
        break;
    case 'mostrar':
        mostrar();
        break;
    case 'unico':
        mostrar_registro();
        break;
    default:
        echo "No deberias estar aqui";
        echo '<br><a href="tabla_dinamica.php">Ver los videojuegos</a>';
        break;
    }
}

?>