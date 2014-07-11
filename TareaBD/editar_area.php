<?php
    $id_a = (int)$_GET["pre1"];
    $_SHARED["id_edit_area"] = $id_a;
    $dbconn = pg_connect("host=localhost port=5432 dbname=TareaBD user=postgres password=123") or die('<h1>ERROR: </h1>' . pg_last_error());
    $query = "SELECT * FROM area_jim WHERE id_area = '$id_a'";
    $result = pg_query($query);
    $row = pg_fetch_array($result);
    
    
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="" />

	<title>Prueba página</title>
</head>

<body>
<h1>EDITAR AREA:</h1>
<form method="POST" action="val_editar_area.php">
            <p>TipoCoordGeneral: <input type="text" value="<?php echo $row[1] ?>" name="TCG"></p>
            <p>TipoTunel: <input type="text" value="<?php echo $row[2] ?>" name="TT"></p>
            <p>TipoDinamicas: <input type="text" value="<?php echo $row[3] ?>" name="TD"></p>
            <p>TipoConcursos: <input type="text" value="<?php echo $row[4] ?>" name="TC"></p>
            <p>TipoRegistroVisual: <input type="text" value="<?php echo $row[5] ?>" name="TRV"></p>
            <p>TipoAlimentacion: <input type="text" value="<?php echo $row[6] ?>" name="TA"></p>
            <p>TipoAudio: <input type="text" value="<?php echo $row[7] ?>" name="TAU"></p>
            <p>id_horario: <input type="text" value="<?php echo $row[8] ?>" name="IH"></p>
            <input type="submit" value="Editar">
</form>
<form method="GET" action="panel.php">
            <input type="submit" value="Volver">
</form>

</body>
</html>
<?php pg_close(); ?>