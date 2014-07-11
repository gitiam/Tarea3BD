<!DOCTYPE html> 
<?php
session_start();
?>
<html> 
<head> 
    <title>Postulantes</title> 
</head> 
  
<body> 
    <h1>Seleccione algun postulante.</h1> 
 <?php
$dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
	or die('No se ha podido conectar: ' . pg_last_error());
$id_coor = $_GET["id_coordinador"];
//$sql = 'SELECT "id_area" FROM "Coordinador" WHERE "id_coordinador"=\''.$id_coor.'\'';
//$result = pg_query($sql);
//$row = pg_fetch_array($result);
$id_coor = '1';
$sql = 'SELECT "Postulacion".id_postulacion,"Alumno".nombre FROM "Alumno","Postulante","Postulacion","Coordinador" WHERE "Postulante".id_alumno="Alumno".id_alumno AND "Postulacion".id_postulante="Postulante".id_postulante AND "Coordinador".id_area="Postulacion".id_area AND "Coordinador".id_alumno=\''.$id_coor.'\'';
$result = pg_query($sql);
$row = pg_fetch_array($result);
echo $row[1];

 ?>
<form method="post" action="agregarcolaborador.php">
	<select name="cola">
		<?php
		$contador = 0;
		while($rows=pg_fetch_row($result,$contador,PGSQL_NUM)){
		?>
		<option value="<?= htmlspecialchars($rows[0]) ?>"><?=htmlspecialchars($rows[1])?></option>
		<?php
		$contador = $contador+1;
		}
		?>
	</select>
	<br><input type='submit' value='Ingresar'></br>
<?php
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
?>



    </body> 
</html>