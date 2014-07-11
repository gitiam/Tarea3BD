<?php
session_start();
$dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
    or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());
$id_cola = $_POST["cola"];
$id_coor = $_SESSION["id_coordinador"];
echo $id_coor;
echo "algo";
echo $id_cola;
//UPDATE "Postulacion" SET "id_coordinador"=1 WHERE "id_postulacion"=4;
$sql = 'UPDATE "Postulacion" SET "id_coordinador"=\''.$id_coor.'\' WHERE "id_postulacion"=\''.$id_cola.'\'';
$result = pg_query($sql);
if($result){
	echo "Colaborador Agregado";
	echo '<a href="Mmenucoordinador.php">menucoordinador.</a></p>';

}
else{
	echo "Problemas al agregar.";
}
?>