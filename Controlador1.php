<?php
    error_reporting(E_ALL);
    function insertar($name, $age, $study_grade, $gender){
        switch($study_grade){
            case "Licenciatura trunca":
                $status = "Rechazado";
                $motive = "Nivel de estudios";
                break;
            case "Licenciatura en curso":
                $status = "Rechazado";
                $motive = "Nivel de estudios";
                break;
            case "Licenciatura concluida":
                $status = "Pendiente";
                $motive = "Aprobacion depende del encargado de area";
                break;
            default:
                $status = "Aceptado";
                $motive = NULL;
                break;
        }
        $conexion = mysqli_connect("localhost:3306", "root", "", "pruebas");

        $query = "INSERT INTO demo1 (nombre, edad, escolaridad, genero, estatus, motivo) VALUES('$name', '$age', '$study_grade', '$gender', '$status', '$motive')";
        $consulta = mysqli_query($conexion, $query);

        if($consulta){
            //echo "Se logro insertar";
        }
        else{
            //echo "Fallo para este proceso";
            //print_r(error_get_last());
            //echo mysqli_errno($conexion)." ".mysqli_error($conexion);
        }

        //$consulta -> close();
        
        $terminar = mysqli_close($conexion);
        //$visible1 = "hidden";
        //$visible2 = "visible";
        //$mostrar1 = "none";
        //$mostrar2 = "block";
    }

    
    //echo "Empieza";
    if(isset($_POST["Nombre"]) && isset($_POST["Edad"]) && isset($_POST["Escolaridad"]) && isset($_POST["Genero"])){
        $nombre = $_POST["Nombre"];
        //echo $nombre;
        $edad = $_POST["Edad"];
        //echo $edad;
        $grado = $_POST["Escolaridad"];
        //echo $grado;
        $genero = $_POST["Genero"];
        //echo $genero;
        insertar($nombre, $edad, $grado, $genero);
    }
    else{
        echo "El error viene desde aqui";
    }
    
    //$resultado = 
    
    //echo $resultado;

    $campos = array("Nombre", "Edad", "Escolaridad", "Genero", "Estatus");
    /*$datos = array("Nombres" => array("Alberto", "Fernando"), 
                    "Edades" => array(22, 35), 
                    "Escolaridad" => array("Licenciatura", "Posgrado"), 
                    "Genero" => array("Hombre", "Mujer"), 
                    "Estatus" => array("Rechazado", "Aceptado"));*/
    $i = 0;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Resultado de Pruebas</title>
        <script src="link_dialog.js"></script>
    </head>
    <body>
    <?php
        echo "<table border=5 align=center id=Resultados>";
            echo "<tr>";
                

                    $conexion = mysqli_connect("localhost:3306", "root", "", "pruebas");
        
                    $query = "SELECT * FROM demo1";
                    $consulta = mysqli_query($conexion, $query);
                                       
                    $terminar = mysqli_close($conexion);

                    $cool = 3;
                    while ($i < 5) {
                        echo "<th colspan=$cool> $campos[$i] </th>" ;
                        $i++;
                    }
                
            echo "</tr>";
            ?>
            
            <?php
                $colores = array("red", "green", "orange");
                $j = 0;
                while($dato = mysqli_fetch_assoc($consulta)){
                    echo "<tr>";
                        //$color = $colores[$j];                   
                        echo "<td colspan=$cool>".$dato["nombre"]."</td>";
                        echo "<td colspan=$cool align = center>".$dato["edad"]."</td>";
                        echo "<td colspan=$cool>".$dato["escolaridad"]."</td>";
                        echo "<td colspan=$cool>".$dato["genero"]."</td>";
                        if($dato["estatus"] == "Aceptado"){
                            $j = 1;
                        }
                        elseif ($dato["estatus"] == "Rechazado") {
                            $j = 0;
                        }
                        else{
                            $j = 2;
                        }
                        echo "<td colspan=$cool bgcolor=$colores[$j]><a href="."#dialog"." id=Button1".">".$dato["estatus"]."</a></td>";
                        $j++;
                    echo "</tr>";
                }
                /*foreach ($consulta as $dato) {
                    echo "<tr>";
                        //$color = $colores[$j];                   
                        echo "<td colspan=$cool>".$dato["nombre"]."</td>";
                        echo "<td colspan=$cool align = center>".$dato["edad"]."</td>";
                        echo "<td colspan=$cool>".$dato["escolaridad"]."</td>";
                        echo "<td colspan=$cool>".$dato["genero"]."</td>";
                        echo "<td colspan=$cool bgcolor=$colores[$j]>".$dato["estatus"]."</td>";
                        $j++;
                    echo "</tr>";
                }*/
            ?>
        </table>
        <dialog id="demoDialog">
                <form method="dialog">
                    <section>
                        <p>Demo del cuadro de dialogo</p>
                        <input type="radio" id="accept" name="request_status" value="Aceptado">
                        <label for="accept">Aceptado</label><br>
                        <input type="radio" id="reject" name="request_status" value="Rechazado">
                        <label for="reject">Rechazado</label><br>
                        <input type="radio" id="pendant" name="request_status" value="Pendiente">
                        <label for="pendant">Pendiente</label><br>
                        <label for="reason">Motivo</label>
                        <textarea id="reason" name="reason"></textarea>
                        <br><br>
                    </section>
                    <menu></menu>
                </form>
        </dialog>
        <h4>"Los resultados se podran modificar a futuro"</h4>
    </body>
</html>