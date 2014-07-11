<!DOCTYPE html> 
<html> 
<head>
    <title>Areas</title> 
</head> 
  	<h1>Areas</h1> 
<body>       
                AREAS
                <form method="GET" action="panel.php">
                <select name="pre1">
                    <?php
                    $dbconn = pg_connect("host=localhost port=5432 dbname=TareaBD user=postgres password=123")
                    or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());
                    $sql = 'SELECT * FROM "area_jim"';
                    $result = pg_query($sql);
                    $row = pg_fetch_array($result);
                    $contador = 0;
                    
                    while($rows=pg_fetch_row($result,$contador,PGSQL_NUM)){
                    ?>
                    <option value="<?= htmlspecialchars($rows[0]) ?>">ID:<?=htmlspecialchars($rows[0])?>--COORDGEN:<?=htmlspecialchars($rows[1])?>--TUNEL:<?=htmlspecialchars($rows[2])?>--DINAMICAS:<?=htmlspecialchars($rows[3])?>--CONCURSOS:<?=htmlspecialchars($rows[4])?>--REGISTRO:<?=htmlspecialchars($rows[5])?>--ALIMENTACION:<?=htmlspecialchars($rows[6])?>--AUDIO:<?=htmlspecialchars($rows[7])?>--ID.HORARIO:<?=htmlspecialchars($rows[8])?></option>
                    <?php
                    $contador = $contador+1;
                    }
                    ?>
                </select> 
            <input type="submit" value="Salir">              
            <input type="submit" value="Eliminar" formaction="eliminar_area.php">
            <input type="submit" value="Editar" formaction="editar_area.php">
            <input type="submit" value="Agregar" formaction="agregar_area.php">
        </form> 
</body>  
</html>