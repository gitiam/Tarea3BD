<?php
session_start();
$dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
    or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());
$titu = $_POST["titular"];
$cont = $_POST["comunicacion"];
$fecha = date("m.d.y");
//$sql = 'INSERT INTO "Noticia" VALUES (\''.$titu.'\',\''.$cont.'\',\''.$fecha.'\')';
$result = pg_query($sql);
$sql = 'SELECT "id_noticia" FROM "Noticia" WHERE "titular"=\''.$titu.'\' AND "fecha"=\''.$fecha.'\'';
$result = pg_query($sql);
$row = pg_fetch_array($result);
echo $row[0];
$sql = 'INSERT INTO "Publicaciones" VALUES (\''.$row[0].'\',\''.$_SESSION["id_coordinador"].'\')';
$result = pg_query($sql);
if($result){
	echo "Noticia Enviada";
	echo '<a href="menucoordinador.php">Menu.</a></p>';

}
else{
	echo "Problemas al agregar.";
}
?>