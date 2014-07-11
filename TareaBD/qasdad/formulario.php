<!DOCTYPE html> 
<html> 
<head>
    <title>Agregar Equipo</title> 
</head> 
  	<h1>Agregar Equipo</h1> 
<body> 
        <form method ='post' action="postular.php"> 
            <pre> 
                Nombre:         <input type="text" name="nombre">
                Rol:            <input type="text" name="rol">
                Rut:            <input type="text" name="rut">
                Contraseña:     <input type="text" name="pass">
                Carrera:        <input type="text" name="carrera">
                Correo:         <input type="text" name="correo">
                telefono:       <input type="text" name="tele">
    <h2>
Seleccione preferencias de Areas de Trabajo.
    </h2>       
                Preferencia 1.
                <select name="pre1">
                    <?php
                    $dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
                    or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());
                    $sql = 'SELECT "nombre","id_area" FROM "Area"';
                    $result = pg_query($sql);
                    $row = pg_fetch_array($result);
                    $contador = 0;
                    
                    while($rows=pg_fetch_row($result,$contador,PGSQL_NUM)){
                    ?>
                    <option value="<?= htmlspecialchars($rows[1]) ?>"><?=htmlspecialchars($rows[0])?></option>
                    <?php
                    $contador = $contador+1;
                    }
                    ?>
                </select>

                Preferencia 2.
                <select name="pre2">
                    <?php
                    $contador = 0;
                    ?>
                    <option value="">Ninguna</option>
                    <?php
                    while($rows=pg_fetch_row($result,$contador,PGSQL_NUM)){
                    ?>
                    <option value="<?= htmlspecialchars($rows[1]) ?>"><?=htmlspecialchars($rows[0])?></option>
                    <?php
                    $contador = $contador+1;
                    }
                    ?>
                </select>

                Preferencia 3.
                <select name="pre3">
                        <?php
                        $contador = 0;
                        ?>
                        <option value="">Ninguna</option>
                        <?php
                        while($rows=pg_fetch_row($result,$contador,PGSQL_NUM)){
                        ?>
                        <option value="<?= htmlspecialchars($rows[1]) ?>"><?=htmlspecialchars($rows[0])?></option>
                        <?php
                        $contador = $contador+1;
                        }
                        ?>
                </select>

            </pre> 
            <br><input type="submit" value="Postular"></br> 
        </form> 
        <a href = "login.php"><input type="submit" value="Salir"></a> 
</body>  
</html>