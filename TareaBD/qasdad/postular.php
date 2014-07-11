<?php
session_start();
$dbconn = pg_connect("host=localhost port=5432 dbname=bd user=postgres password=tarea")
    or die('<h1>No se ha podido conectar: </h1>' . pg_last_error());
$nom = $_POST['nombre'];
$rol = $_POST['rol'];
$pass = $_POST['pass'];
$carr = $_POST["carrera"];
$rut = $_POST['rut']; 
$correo = $_POST['correo'];
$tele = $_POST['tele'];
$pre1 = $_POST['pre1'];
$pre2 = $_POST['pre2'];
$pre3 = $_POST['pre3'];

if($rut != "" && $pass != "" && $nom != "" && $rol != "" && $correo != "" && $tele != "" && $pre1 != "")
{
	$sql1 = 'SELECT "codigocarrera" FROM "Carrera" WHERE "nombre"=\''.$carr.'\'';
	$result1 = pg_query($sql1);
	$row =  pg_fetch_array($result1);
	$sql = 'INSERT INTO "Alumno" VALUES ('.$row["codigocarrera"].',\''.$nom.'\',\''.$rol.'\',\''.$rut.'\',\''.$correo.'\',\''.$tele.'\',\''.$pass.'\',\'\')';
	//$result = pg_query($sql) or die('Error al ingresar equipo: ' . pg_last_error());
	$sql2 = 'SELECT "id_alumno" FROM "Alumno" WHERE "rut"=\''.$rut.'\'';
	$result2 = pg_query($sql2) or die('ERROR' . pg_last_error());
	$row5 = pg_fetch_array($result2);
	echo $pre1;
	$sql3 = 'INSERT INTO "Postulante" VALUES (\''.$row5[0].'\')';
	//$result3 = pg_query($sql3) or die('1.ERROR' . pg_last_error());
	$sql4 = 'SELECT "id_area" FROM "Area" WHERE "id_area"=\''.$pre1.'\'';
	$result4 = pg_query($sql4);
	$row3 = pg_fetch_array($result4);
	echo $row5[0];
	echo "  hola ".$row3[0];
	$sql = 'INSERT INTO "Postulacion" VALUES (\''.$row5[0].'\',\''.$row3["id_area"].'\',0)';
	$result=pg_query($sql);
	if($result){
		echo "Se han agregado exitosamente";
	}
	if ($pre2 != null){
		$sql5 = 'SELECT "id_area" FROM "Area" WHERE "nombre"=\''.$pre2.'\'';
		$result5 = pg_query($sql5);
		$row4 = pg_fetch_array($result5);
		$sql6 = 'INSERT INTO "Postulacion" VALUES ('.$row["id_alumno"].','.$row4["id_area"].',0)';
		$result6 = pg_fetch_array($result6);

	}
	if($pre3 != null){
		$sql7 = 'SELECT "id_area" FROM "Area" WHERE "nombre"=\''.$pre3.'\'';
		$result7 = pg_query($sql7);
		$row7 = pg_fetch_array($result7);
		$sql8 = 'INSERT INTO "Postulacion" VALUES ('.$row["id_alumno"].','.$row["id_area"].',0)';
		$result = pg_fetch_array($result8);
	}

	//header("Location:login.php");
	
	
	pg_free_result($result1);
	pg_free_result($result);
	pg_close($dbconn); 
}
else{
	echo "PORFAVOR LLENE TODOS LOS CAMPOS OBLIGATORIOS";
}



?>