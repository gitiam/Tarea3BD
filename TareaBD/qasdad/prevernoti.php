<!DOCTYPE html> 
<html> 
<head>
    <title>Noticias</title> 
</head> 
<h2>Seleccione la noticia que desea ver.</h2>
<body> 
	<h3>LAS ULTIMAS NOTICIAS.</h3>
	<?php
	echo "Titulares";
	?>
		<form method ='post' action="vernoti.php"> 
        <select name="noticia">
        	
                    <?php
                    session_start();
                    $dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
                    or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());
                    $id_area = $_SESSION["id_area"];

                    if($id_area == 1){
                    	$sql = 'SELECT "id_noticia","titular" FROM "Noticia"';
                    }
                    else{
						$sql = 'SELECT "Noticia".id_noticia,"Noticia".titular FROM "Noticia","Publicaciones" WHERE "Noticia".id_noticia = "Publicaciones".id_noticia AND "Publicacion".id_coordinador=\''.$_SESSION["id_coordinador"].'\'';
                    
                    }
                    $result = pg_query($sql);
                    $row = pg_fetch_array($result);
                    $contador = 0;
                    
                    while($rows=pg_fetch_row($result,$contador,PGSQL_NUM)){
                    ?>
                    <option value="<?= htmlspecialchars($rows[0]) ?>"><?=htmlspecialchars($rows[1])?></option>
                    <?php
                    $contador = $contador+1;
                    }

                    pg_free_result($result);
					pg_close($dbconn);
					
                    ?>
                </select>
                
                <br><input type="submit" value="Ver noticia"></br>
</form>
               
</body>  
</html>

