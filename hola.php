<!DOCTYPE html>
<html>
    
    <head>
        <title>Pruebas</title>
    </head>
    <?php
       
        $visible1 = "visible";
        $visible2 = "hidden";
        $mostrar1 = "block";
        $mostrar2 = "none";
    ?>
    <body>
        <?php
            echo "<div align=center style = visibility:$visible1; display:$mostrar1 id=Registrar>";
        ?>
        
            <form id="Registro" action="Controlador1.php" method="POST">
                <label>Nombre:</label>
                <input type="text" name="Nombre" placeholder="Nombre completo"/>
                </br>
                <label>Edad:</label>
                <input type="text" style="width:48px" name="Edad" placeholder="Tu edad"/>
                </br>
                <label>Escolaridad:</label>
                <select name="Escolaridad">
                    <option value="Licenciatura trunca" selected>Lic.Trunca</option>
                    <option value="Licenciatura en curso">Lic.en Curso</option>
                    <option value="Licenciatura concluida">Lic.concluida c/s Titulo</option>
                    <option value="Posgrado en curso">Posgrado en curso</option>
                    <option value="Posgrado concluido">Posgrado finalizado</option>
                    <option value="Maestria en curso">Maestria en curso</option>
                </select>
                </br>
                <label>Genero:</label>
                <select name="Genero">
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
                </br>
                <button type="submit" name="Registrar">Enviar</button>
                
            </form>
        </div>

        
    </body>

</html>
