<!DOCTYPE HTML>
<html>
<head>

	<title>Nueva Noticia</title>
</head>
<h1>Llene los siguientes campos</h1>
<body>
	<form method ='post' action="agrenoti.php"> 
    <pre> 
Titular:         <input type="text" name="titular">
Noticia: 	     
		<textarea id="textarea_comunicacion" name="comunicacion" rows="5" cols="50">Escriba su Noticia</textarea>
	<?php
	session_start();
	?>

Seleecione Area	<select name="area">
		<?php
        $dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
        or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());
        if($_SESSION["id_area"] == "1"){
        	$sql = 'SELECT "nombre","id_area" FROM "Area"';
        }
        else{
        	$sql = 'SELECT "nombre","id_area" FROM "Area" WHERE "id_area"=\''.$_SESSION["id_area"].'\'';
        }
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

	</pre>
<br><input type="submit" value="Enviar Noticia"></br> 
<?php
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
?>


</body>
</html>