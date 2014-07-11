<!DOCTYPE html> 
<html> 
<head>
    <title>Menu Coordinador</title> 
</head> 
<body> 
        <?php
        session_start();
        $dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
    	or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());
        $sql = 'SELECT "nombre" FROM "Alumno" WHERE "id_alumno"=\''.$_SESSION["id_alumno"].'\'';
        $result = pg_query($sql);
        $row = pg_fetch_array($result);
        echo "<h2>Bienvenido Coordinador ".$row[0]."</h2>";
        pg_free_result($result);
        pg_close($dbconn);
        ?>
        <a href = "misdatos.php"><input type="submit" value="Ver mis datos"></a>
        <a href = "noticias.php"><input type="submit" value="Noticias"></a>
        <a href = "postulantes.php"><input type="submit" value="Postulantes"></a> 
        <a href = "colselec.php"><input type="submit" value="Colaboradores Seleccionados"></a> 
        <a href = "Salir.php"><input type="submit" value="Salir"></a> 
</body>  
</html>