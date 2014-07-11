<!DOCTYPE html> 
<?php
session_start();
?>
<html> 
<head> 
    <title>Noticias</title> 
</head> 
  
<body> 
    <h1>Noticia.</h1> 
<?php
// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
    or die('No se ha podido conectar: ' . pg_last_error());
//$id_C = $_GET["id_coordinador"];
session_start();
$id_c='1';
//$sql = 'SELECT "Noticia".id_noticia,"Noticia".titular,"Noticia".fecha,"Noticia".contenido FROM "Publicaciones", "Noticia","Coordinador" WHERE "Publicaciones".id_noticia = "Noticia".id_noticia AND "Publicaciones".id_coordinador = "Coordinador".id_coordinador AND "Coordinador".id_area=\''.$_SESSION["id_area"].'\'';
$id_noti = $_POST["noticia"];
$sql = 'SELECT "titular","contenido","fecha" FROM "Noticia" WHERE "id_noticia"=\''.$id_noti.'\'';
$result = pg_query($sql);
echo $id_noti;
if(!$result){
    echo "entra";
}
$row = pg_fetch_array($result);
echo "<h1>Titular: ".$row[0]."</h1>";
echo "<h2>Fecha: ".$row[2]."</h2>";
echo "<h2>Contenido:</h2>";
echo $row[1];
// $result=pg_query('SELECT "id_postulante" FROM "Postulaciones" WHERE "id_coordinador"=\''.$id_c.'\'');
// $row=pg_fetch_row($resultx);
// $result0=pg_query('SELECT "id_alumno" FROM "Postulante" WHERE "id_postulante"=\''.$row["id_postulante"].'\'');
// $row1=pg_fetch_array($result0);
// $result1=pg_query('SELECT "id_alumno","nombre" FROM "Alumno" WHERE "id_alumno"=\''.$row["id_alumno"].'\'');
// $row2=pg_fetch_array($result1);
//echo "<select name='select1'>";

pg_close($dbconn);
$sql = 'SELECT "id_coordinador" FROM "Coordinador" WHERE "id_alumno"=\''.$_SESSION["id_alumno"].'\'';
$result = pg_query($sql);
if($result){
    echo '<a href = "menucoordinador.php"><input type="submit" value="Volver al menu"></a> ';
}
else{
    echo '<a href = "menucolaborador.php"><input type="submit" value="Volver al menu"></a> ';
}
?> 

</body> 
</html>