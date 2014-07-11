<!DOCTYPE html> 
<html> 
<head>
    <title>Menu Colaborador</title> 
</head> 
<body> 
        <?php
        session_start();
        $dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
    	or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());
        $sql = 'SELECT "nombre" FROM "Alumno" WHERE "id_alumno"=\''.$_SESSION["id_alumno"].'\'';
        $result = pg_query($sql);
        $row = pg_fetch_array($result);
        echo "<h2>Bienvenido Colaborador ".$row[0]."</h2>";
        pg_free_result($result);
        pg_close($dbconn);
        ?>
        <a href = "misdatos.php"><input type="submit" value="Ver mis datos"></a>
        <a href = "prevernoti.php"><input type="submit" value="Ver Noticias"></a>
        <a href = "index.php"><input type="submit" value="Salir"></a> 
</body>  
</html>